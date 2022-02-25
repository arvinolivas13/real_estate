<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('leave_type');
            $table->integer('total_hours');
            $table->unsignedBigInteger('employee_id');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('leave_type')
                ->references('id')
                ->on('leave_types')
                ->onDelete('cascade');
                
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
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
        Schema::dropIfExists('leaves');
    }
}
