<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->string('category');
            $table->string('summa');
            $table->string('oqtuvci')->nullable();
            $table->string('qonstruq')->nullable();
            $table->string('qonstruq2')->nullable();
            $table->string('qonstruq3')->nullable();
            $table->string('mashina')->nullable();
            $table->string('mashina2')->nullable();
            $table->string('mashina3')->nullable();
            $table->date('data')->nullable();
            $table->date('data2')->nullable();
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
        Schema::dropIfExists('groups');
    }
}
