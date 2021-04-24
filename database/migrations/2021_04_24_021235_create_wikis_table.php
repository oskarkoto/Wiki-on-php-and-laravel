<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWikisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wikis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('wtype');
            $table->unsignedBigInteger('wstate')->default(100);
            $table->unsignedBigInteger('author');
            $table->timestamps();

            $table->foreign('wtype')->references('id')->on('wtypes')->onDelete('cascade','cascade');
            $table->foreign('wstate')->references('id')->on('wstates')->onDelete('cascade','cascade');
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade','cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wikis');
    }
}
