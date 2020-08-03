<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('marital_status')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->date('dob')->nullable();
            $table->tinyInteger('is_lead');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('phone_id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('company_id');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('phone_id')->references('id')->on('phones');
            $table->foreign('employee_id')->references('id')->on('employees')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
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
