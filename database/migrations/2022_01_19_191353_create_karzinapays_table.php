<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarzinapaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karzinapays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('publi_id');
            $table->integer('group_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('payment');
            $table->date('data');
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
        Schema::dropIfExists('karzinapays');
    }
}
