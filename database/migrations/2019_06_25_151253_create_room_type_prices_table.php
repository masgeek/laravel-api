<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_type_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('room_type_id')->unsigned();
            $table->string('currency')->default('USD');
            $table->float('room_price');
            $table->timestamps();

            $table->foreign('room_type_id','fk-prices-room-type-id')
                ->references('id')
                ->on('room_types')
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
        Schema::dropIfExists('room_type_prices');
    }
}
