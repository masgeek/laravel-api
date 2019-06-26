<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('room_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('customer_names', 120);
            $table->string('customer_email', 120);
            $table->integer('total_nights');
            $table->float('total_cost');
            $table->bigInteger('user_id')->nullable(true);
            $table->timestamps();

            $table->foreign('room_id','fk-booking-room-id')
                ->references('id')
                ->on('hotel_rooms')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('hotel_bookings');
    }
}
