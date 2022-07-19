<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaDetailLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_detail_lots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subscriber_no')->nullable();
            $table->unsignedBigInteger('block_id');
            $table->string('lot');
            $table->string('area');
            $table->string('psqm');
            $table->string('tcp');
            $table->string('reservation_percent');
            $table->string('reservation_fee');
            $table->string('balance');
            $table->string('monthly_amortization');
            $table->string('status');
            $table->string('created_user');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('block_id')
                ->references('id')
                ->on('area_details')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_detail_lots');
    }
}
