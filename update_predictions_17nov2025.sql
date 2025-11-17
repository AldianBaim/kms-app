-- ========================================
-- SQL SCRIPT UNTUK UPDATE PREDICTIONS DATA
-- Tanggal: 17 November 2025
-- File: update_predictions_17nov2025.sql
-- ========================================

-- 1. Backup tabel lama (opsional)
-- CREATE TABLE predictions_backup_20251117 AS SELECT * FROM predictions;

-- 2. Truncate tabel predictions
TRUNCATE TABLE predictions;

-- 3. Reset auto increment
ALTER TABLE predictions AUTO_INCREMENT = 1;

-- 4. INSERT DATA BARU
-- Data dari CSV Prediction17Nov2025.csv
-- Format: INSERT INTO predictions (tanggal, plant_type, price, created_at, updated_at) VALUES

-- Sample data (bisa di-generate dari CSV menggunakan script PHP berikut:)

-- Untuk generate SQL lengkap, gunakan script PHP ini:
/*
<?php
require_once __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$csvFile = __DIR__ . '/Prediction17Nov2025.csv';
$sqlFile = __DIR__ . '/predictions_insert.sql';

$handle = fopen($csvFile, 'r');
$headers = fgetcsv($handle);
$plantTypes = array_slice($headers, 1);

$sql = "-- Generated INSERT statements for predictions table\n\n";
$batchData = [];

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
            
            if (count($batchData) >= 1000) {
                $sql .= "INSERT INTO predictions (tanggal, plant_type, price, created_at, updated_at) VALUES\n";
                $sql .= implode(",\n", $batchData) . ";\n\n";
                $batchData = [];
            }
        }
    }
}

if (!empty($batchData)) {
    $sql .= "INSERT INTO predictions (tanggal, plant_type, price, created_at, updated_at) VALUES\n";
    $sql .= implode(",\n", $batchData) . ";\n";
}

fclose($handle);
file_put_contents($sqlFile, $sql);
echo "SQL file generated: $sqlFile\n";
?>
*/

-- 5. Verifikasi data setelah import
SELECT COUNT(*) as total_records FROM predictions;
SELECT COUNT(DISTINCT plant_type) as unique_plants FROM predictions;
SELECT MIN(tanggal) as min_date, MAX(tanggal) as max_date FROM predictions;

-- 6. Sample data check
SELECT tanggal, plant_type, price 
FROM predictions 
ORDER BY tanggal ASC, plant_type ASC 
LIMIT 10;

-- 7. Index untuk performance (jika belum ada)
CREATE INDEX IF NOT EXISTS idx_predictions_plant_type ON predictions(plant_type);
CREATE INDEX IF NOT EXISTS idx_predictions_tanggal ON predictions(tanggal);
CREATE INDEX IF NOT EXISTS idx_predictions_plant_tanggal ON predictions(plant_type, tanggal);

-- ========================================
-- NOTES:
-- 1. Total expected records: 28,236
-- 2. Total plant types: 181
-- 3. Date range: 2024-01-07 to 2026-12-27
-- 4. Backup data lama sebelum menjalankan script ini
-- ========================================