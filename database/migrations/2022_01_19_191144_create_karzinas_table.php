<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarzinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karzinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('publi_id');
            $table->integer('group_id');
            $table->string('cagigory');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('ochestvo');
            $table->integer('phone');
            $table->date('birthdata');
            $table->string('malumoti');
            $table->string('seriya');
            $table->string('adress');
            $table->string('adress2');
            $table->integer('jamis')->nullable();
            $table->date('kundata')->nullable();
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
        Schema::dropIfExists('karzinas');
    }
}
