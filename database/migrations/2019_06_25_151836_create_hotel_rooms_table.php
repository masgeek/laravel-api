<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomsTable extends Migration
{
    private $tableName = 'hotel_rooms';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('room_type_id')->unsigned();
            $table->string('room_name', 100);
            $table->binary('image')->nullable(true);
            $table->timestamps();

            $table->foreign('hotel_id', 'fk-hotel-room-id')
                ->references('id')
                ->on('hotels')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('room_type_id', 'fk-hotel-room-type-id')
                ->references('id')
                ->on('room_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        //since laravel does not support long and medium blobs and we need that for base image storage
        DB::statement("ALTER TABLE {$this->tableName} MODIFY image LONGBLOB");
    }

    /**
     * Reverse the migrations
     */
    public function down()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropForeign('fk-hotel-room-type-id');
            $table->dropForeign('fk-hotel-room-id');
        });
        Schema::dropIfExists($this->tableName);
    }
}
