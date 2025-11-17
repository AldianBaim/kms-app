<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "=== GENERATING SQL INSERT STATEMENTS ===" . PHP_EOL;

$csvFile = __DIR__ . '/Prediction17Nov2025.csv';
$sqlFile = __DIR__ . '/predictions_insert_data.sql';

if (!file_exists($csvFile)) {
    echo "Error: CSV file not found" . PHP_EOL;
    exit(1);
}

$handle = fopen($csvFile, 'r');
$headers = fgetcsv($handle);
$plantTypes = array_slice($headers, 1);

$sql = "-- Generated INSERT statements for predictions table\n";
$sql .= "-- Generated on: " . date('Y-m-d H:i:s') . "\n";
$sql .= "-- Total plant types: " . count($plantTypes) . "\n\n";

$sql .= "-- Truncate table first\n";
$sql .= "TRUNCATE TABLE predictions;\n";
$sql .= "ALTER TABLE predictions AUTO_INCREMENT = 1;\n\n";

$batchData = [];
$totalRecords = 0;
$batchCount = 1;

while (($row = fgetcsv($handle)) !== false) {
    $tanggal = trim($row[0]);
    $dateObj = DateTime::createFromFormat('Y-m-d', $tanggal);
    if (!$dateObj) continue;
    
    for ($i = 1; $i < count($row); $i++) {
        if (!isset($plantTypes[$i-1])) continue;
        
        $plantType = trim($plantTypes[$i-1]);
        $price = trim($row[$i]);
        
        if ($price === '' || $price === '0' || !is_numeric($price)) continue;
        
        $numericPrice = (float) $price;
        if ($numericPrice > 0) {
            $plantTypeEscaped = addslashes($plantType);
            $batchData[] = "('$tanggal', '$plantTypeEscaped', $numericPrice, NOW(), NOW())";
            $totalRecords++;
            
            if (count($batchData) >= 1000) {
                $sql .= "-- Batch $batchCount (Records: " . count($batchData) . ")\n";
                $sql .= "INSERT INTO predictions (tanggal, plant_type, price, created_at, updated_at) VALUES\n";
                $sql .= implode(",\n", $batchData) . ";\n\n";
                $batchData = [];
                $batchCount++;
            }
        }
    }
}

if (!empty($batchData)) {
    $sql .= "-- Final batch $batchCount (Records: " . count($batchData) . ")\n";
    $sql .= "INSERT INTO predictions (tanggal, plant_type, price, created_at, updated_at) VALUES\n";
    $sql .= implode(",\n", $batchData) . ";\n\n";
}

$sql .= "-- Verification queries\n";
$sql .= "SELECT COUNT(*) as total_records FROM predictions;\n";
$sql .= "SELECT COUNT(DISTINCT plant_type) as unique_plants FROM predictions;\n";
$sql .= "SELECT MIN(tanggal) as min_date, MAX(tanggal) as max_date FROM predictions;\n";

fclose($handle);
file_put_contents($sqlFile, $sql);

echo "✅ SQL file generated: $sqlFile" . PHP_EOL;
echo "📊 Total records to insert: $totalRecords" . PHP_EOL;
echo "📁 File size: " . number_format(filesize($sqlFile)) . " bytes" . PHP_EOL;
echo "\n🚀 Upload file '$sqlFile' ke server dan jalankan di MySQL" . PHP_EOL;
?>