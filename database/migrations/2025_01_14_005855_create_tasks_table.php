<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->length(500)->nullable();
            $table->enum('status', ['pending','in_progress', 'completed'])->default('pending');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
        /** 
         * Prefiero generar las referencias de esta manera para hacer mas manejable y entendible el codigo, es mas me gusta agregar
         * una migracion dedicada a las relaciones de las tablas, pero en este caso lo hago de esta manera para no hacer tan extenso
         */
        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('tasks');
    }
};
