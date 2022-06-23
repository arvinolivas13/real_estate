<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('area_id');
            $table->string('block');
            $table->string('status');
            $table->string('created_user');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
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
        Schema::dropIfExists('area_details');
    }
}
