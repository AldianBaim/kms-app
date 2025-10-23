<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Prediction;
use Illuminate\Support\Facades\DB;

class ImportPredictionData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prediction:import {--truncate : Clear existing data first}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import prediction data from Prediction.csv file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $csvPath = storage_path('Prediction.csv');
        
        if (!file_exists($csvPath)) {
            $this->error("CSV file not found at: {$csvPath}");
            return 1;
        }
        
        // Clear existing data if requested
        if ($this->option('truncate')) {
            $this->info('Clearing existing prediction data...');
            Prediction::truncate();
        }
        
        $this->info('Reading CSV file...');
        
        $rows = array_map('str_getcsv', file($csvPath));
        $header = array_shift($rows); // Remove header row
        
        $plantTypes = array_slice($header, 1); // Skip first column (Tanggal)
        
        $this->info('Found ' . count($plantTypes) . ' plant types');
        $this->info('Processing ' . count($rows) . ' date entries');
        
        $progressBar = $this->output->createProgressBar(count($rows) * count($plantTypes));
        $progressBar->start();
        
        DB::beginTransaction();
        
        try {
            foreach ($rows as $row) {
                $date = $row[0];
                
                // Convert date format if needed
                $dateObj = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
                if (!$dateObj) {
                    $dateObj = \DateTime::createFromFormat('Y-m-d', $date);
                }
                if (!$dateObj) {
                    $this->warn("Invalid date format: {$date}");
                    continue;
                }
                
                $formattedDate = $dateObj->format('Y-m-d');
                
                // Insert each plant type for this date
                foreach ($plantTypes as $index => $plantType) {
                    $price = $row[$index + 1] ?? null;
                    
                    if ($price && is_numeric($price)) {
                        Prediction::create([
                            'tanggal' => $formattedDate,
                            'plant_type' => trim($plantType),
                            'price' => floatval($price)
                        ]);
                    }
                    
                    $progressBar->advance();
                }
            }
            
            DB::commit();
            $progressBar->finish();
            $this->newLine();
            $this->info('Prediction data imported successfully!');
            
            $totalRecords = Prediction::count();
            $this->info("Total records in database: {$totalRecords}");
            
            return 0;
        } catch (\Exception $e) {
            DB::rollback();
            $progressBar->finish();
            $this->newLine();
            $this->error('Error importing data: ' . $e->getMessage());
            return 1;
        }
    }
}
