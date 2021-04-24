<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditLog', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('wikiId');
            $table->string('action');

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('wikiId')->references('id')->on('wikis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auditLog');
    }
}
