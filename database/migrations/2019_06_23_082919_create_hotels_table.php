<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    private $tableName = 'hotels';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 50)->unique()->nullable(false);
            $table->text('address');
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('country', 50);
            $table->string('zip_code', 50);
            $table->string('phone_number', 35);
            $table->string('email', 100)->unique()->nullable(false);
            $table->binary('image')->nullable(true);
            $table->timestamps();
        });

        //since laravel does not support long and medium blobs and we need that for base image storage
        DB::statement("ALTER TABLE {$this->tableName} MODIFY image LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
