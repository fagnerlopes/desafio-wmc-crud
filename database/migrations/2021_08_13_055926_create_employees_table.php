<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('name', 190);
            $table->string('address');
            $table->string('number', 25);
            $table->string('neighborhood', 50);
            $table->string('address_details', 50);
            $table->string('postal_code', 15);
            $table->string('cpf', 15)->unique();
            $table->string('rg', 15)->unique();
            $table->string('phone', 15);
            $table->string('cell_phone', 15);
            $table->date('dob');
            $table->string('email', 190)->unique();
            $table->double('wage', 15, 2);
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
        Schema::dropIfExists('employees');
    }
}
