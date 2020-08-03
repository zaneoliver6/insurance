<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('interested');
            $table->date('date_of_interest');
            $table->text('notes');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('phone_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('created_by');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('phone_id')->references('id')->on('phones');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call_logs');
    }
}
