<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name', 35);
            $table->string('middle_name', 35);
            $table->string('last_name', 35)->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('address')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('phone_office');
            $table->string('role')->nullable();
            $table->float('salary')->nullable();
            $table->date('hire_date')->nullable();
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
        Schema::drop('employees');
    }
}
