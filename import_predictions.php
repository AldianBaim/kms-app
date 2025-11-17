<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== IMPORT PREDICTIONS DATA FROM CSV ===\n";
echo "File: Prediction17Nov2025.csv\n\n";

// Truncate table first
echo "Truncating predictions table...\n";
DB::table('predictions')->truncate();
echo "✓ Table truncated successfully\n\n";

// Open CSV file
$csvFile = __DIR__ . '/Prediction17Nov2025.csv';
if (!file_exists($csvFile)) {
    die("❌ Error: CSV file not found at: $csvFile\n");
}

$file = fopen($csvFile, 'r');
if (!$file) {
    die("❌ Error: Could not open CSV file\n");
}

echo "Reading CSV file...\n";

// Read header row
$header = fgetcsv($file);
if (!$header) {
    die("❌ Error: Could not read header row\n");
}

// Get plant types from header (skip first column 'Tanggal')
$plantTypes = array_slice($header, 1);
echo "Found " . count($plantTypes) . " plant types\n\n";

$batchSize = 1000;
$batch = [];
$totalInserted = 0;
$rowCount = 0;

while (($row = fgetcsv($file)) !== false) {
    $rowCount++;
    $date = trim($row[0]);

    // Parse date
    $dateObj = DateTime::createFromFormat('Y-m-d', $date);
    if (!$dateObj) {
        echo "⚠️  Skipping row $rowCount: Invalid date format '$date'\n";
        continue;
    }

    $formattedDate = $dateObj->format('Y-m-d');

    // Process each plant type price
    for ($i = 1; $i < count($row); $i++) {
        $price = trim($row[$i]);

        // Skip if no plant type or empty/invalid price
        if (!isset($plantTypes[$i-1]) || $price === '' || $price === '0' || !is_numeric($price)) {
            continue;
        }

        $plantType = trim($plantTypes[$i-1]);
        $numericPrice = (float) $price;

        if ($numericPrice > 0) {
            $batch[] = [
                'tanggal' => $formattedDate,
                'plant_type' => $plantType,
                'price' => $numericPrice,
                'created_at' => now(),
                'updated_at' => now()
            ];

            // Insert batch when size reached
            if (count($batch) >= $batchSize) {
                DB::table('predictions')->insert($batch);
                $inserted = count($batch);
                $totalInserted += $inserted;
                echo "✓ Inserted batch: $inserted records (Total: $totalInserted)\n";
                $batch = [];
            }
        }
    }
}

// Insert remaining records
if (!empty($batch)) {
    DB::table('predictions')->insert($batch);
    $inserted = count($batch);
    $totalInserted += $inserted;
    echo "✓ Inserted final batch: $inserted records\n";
}

fclose($file);

echo "\n=== IMPORT COMPLETED ===\n";
echo "Total records imported: $totalInserted\n";

// Show summary
$totalRecords = DB::table('predictions')->count();
$uniquePlants = DB::table('predictions')->distinct('plant_type')->count('plant_type');
$dateRange = DB::table('predictions')->selectRaw('MIN(tanggal) as min_date, MAX(tanggal) as max_date')->first();

echo "\n=== DATABASE SUMMARY ===\n";
echo "Total records: $totalRecords\n";
echo "Unique plant types: $uniquePlants\n";
echo "Date range: {$dateRange->min_date} to {$dateRange->max_date}\n";

// Show sample data
echo "\n=== SAMPLE DATA ===\n";
$sample = DB::table('predictions')
    ->select('tanggal', 'plant_type', 'price')
    ->orderBy('tanggal')
    ->limit(5)
    ->get();

foreach ($sample as $record) {
    echo "Date: {$record->tanggal}, Plant: {$record->plant_type}, Price: {$record->price}\n";
}

echo "\n✅ Import process completed successfully!\n";