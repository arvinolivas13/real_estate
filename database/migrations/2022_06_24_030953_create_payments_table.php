<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_id');
            $table->string('code');
            $table->date('date');
            $table->string('payment_type');
            $table->string('payment_classification');
            $table->string('amount');
            $table->string('reference_no')->nullable();
            $table->string('or_no')->nullable();
            $table->string('attachment')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_user')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->foreign('payment_id')
                ->references('id')
                ->on('payment_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
