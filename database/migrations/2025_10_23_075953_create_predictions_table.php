<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('plant_type');
            $table->decimal('price', 15, 2);
            $table->timestamps();
            
            // Indexes for better query performance
            $table->index('tanggal');
            $table->index('plant_type');
            $table->index(['tanggal', 'plant_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('predictions');
    }
}
