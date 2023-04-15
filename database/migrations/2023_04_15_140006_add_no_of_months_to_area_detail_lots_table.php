<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNoOfMonthsToAreaDetailLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('area_detail_lots', function (Blueprint $table) {
            $table->double('no_of_month', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('area_detail_lots', function (Blueprint $table) {
            $table->drodropColumnp('no_of_month');
        });
    }
}
