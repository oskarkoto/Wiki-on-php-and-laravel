<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->unsignedBigInteger('wiki');
            $table->unsignedBigInteger('author');
            $table->timestamps();

            $table->foreign('wiki')->references('id')->on('wikis')->onDelete('cascade','cascade');
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
        Schema::dropIfExists('comments');
    }
}
