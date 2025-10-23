<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToPredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('predictions', function (Blueprint $table) {
            // Add indexes for better query performance
            $table->index('plant_type', 'idx_plant_type');
            $table->index('tanggal', 'idx_tanggal');
            $table->index(['plant_type', 'tanggal'], 'idx_plant_type_tanggal');
            $table->index(['tanggal', 'price'], 'idx_tanggal_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('predictions', function (Blueprint $table) {
            $table->dropIndex('idx_plant_type');
            $table->dropIndex('idx_tanggal');
            $table->dropIndex('idx_plant_type_tanggal');
            $table->dropIndex('idx_tanggal_price');
        });
    }
}
