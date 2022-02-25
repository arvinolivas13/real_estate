<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('classes_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('department_id');
            $table->string('employment_date');
            $table->string('tax_rate')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
            $table->foreign('classes_id')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade');

            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');

            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
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
        Schema::dropIfExists('employments');
    }
}
