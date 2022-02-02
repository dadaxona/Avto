<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJamisummasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jamisummas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('publi_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();
            $table->integer('jamis');
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
     * @return vo'id'
     */
    public function down()
    {
        Schema::dropIfExists('jamisummas');
    }
}
