<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('connection_date');
            $table->string('region');
            $table->string('payment_status');
            $table->string('payment_collected_by');
            $table->string('payment_collection_date');
            $table->string('monthly_amount');
            $table->string('amount_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
