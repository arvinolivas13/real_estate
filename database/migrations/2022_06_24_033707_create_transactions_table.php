<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('lot_id');
            $table->date('starting_date')->nullable();
            $table->string('duration')->nullable();
            $table->string('status')->default('ACTIVE');
            $table->string('created_user')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('lot_id')
                ->references('id')
                ->on('area_detail_lots')
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
        Schema::dropIfExists('transactions');
    }
}
