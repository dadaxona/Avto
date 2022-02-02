<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('group_id')->unsigned();
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

            $table->foreign('group_id')->references('id')->on('groups')
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
        // Schema::dropIfExists('publis');
    }
}
