<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('publi_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('payment');
            $table->date('data');
            $table->date('kundata')->nullable();
            $table->timestamps();

            $table->foreign('publi_id')->references('id')->on('publis')
            ->onDelete('cascade')->onUpdate('cascade');            
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
        Schema::dropIfExists('payments');
    }
}
