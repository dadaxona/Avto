<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvtorasxotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avtorasxots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mashina')->nullable();
            $table->string('nomer')->nullable();
            $table->bigInteger('avto_id')->unsigned();
            $table->date('data')->nullable();
            $table->integer('masofa')->nullable();
            $table->integer('finish')->nullable();
            $table->integer('benzin')->nullable();
            $table->integer('solingan')->nullable();
            $table->integer('masofav')->nullable();
            $table->integer('benzinrashot')->nullable();
            $table->integer('qoldiqbenzin')->nullable();
            $table->date('kundata')->nullable();
            $table->timestamps();

            $table->foreign('avto_id')->references('id')->on('avtos')
            ->onDelete('cascade')->onUpdate('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avtorasxots');
    }
}
