<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pendingvideos', function (Blueprint $table) {
            $table->id('id_video'); // Utilise 'id_video' comme clé primaire
            $table->string('titre');
            $table->integer('duree');
            $table->text('content');
            $table->bigInteger('id_pendingformation'); // Clé étrangère vers 'formations.id'
            $table->timestamps();

            // Définir la clé étrangère
            $table->foreign('id_pendingformation')->references('id')->on('pendingformations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendingvideos');
    }
};
