<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('father_name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('region');
            $table->string('total_payment_collected');
            $table->string('total_payment_given_to_owner');
            $table->string('amount_pending');
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
        Schema::dropIfExists('collectors');
    }
}
