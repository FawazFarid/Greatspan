<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consignee_id')->unsigned()->nullable();
            $table->string('vessel_id')->nullable(); //vessel imo
            $table->string('container_no')->nullable();
            $table->string('voyageNo')->nullable();
            $table->string('bl')->nullable(); //Bill of landing
            $table->date('eta');
            $table->string('status');
            $table->string('documents');//documents submitted
            $table->float('weight')->nullable();
            $table->string('delivery_order')->nullable();
            $table->date('entry_passed')->nullable();
            $table->date('t810_released')->nullable();
            $table->float('port_charges')->nullable();
            $table->date('port_charges_date')->nullable();
            $table->integer('t810')->nullable();
            $table->integer('t812')->nullable();
            $table->integer('driver_id')->unsigned()->nullable();
            $table->string('truck_no')->nullable();
            $table->string('trailer_no')->nullable();
            $table->string('destination')->nullable();
            $table->date('loaded_released')->nullable();
            $table->text('notes')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->date('transfer_date')->nullable();
            $table->date('return_date')->nullable();
            $table->timestamps();
        });
        
        Schema::table('bookings', function($table) {
           //Add foreign keys
            $table->foreign('consignee_id')
                  ->references('id')
                  ->on('consignees')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
                  
            $table->foreign('vessel_id')
                ->references('imo')
                ->on('vessels')
                ->onDelete('set null')
                ->onUpdate('cascade');
            
            $table->foreign('driver_id')
                ->references('id')
                ->on('drivers')
                ->onDelete('set null')
                ->onUpdate('cascade');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
