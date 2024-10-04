<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPendingvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendingvideos', function (Blueprint $table) {
            // Assurez-vous que la colonne id_formation existe et est de type bigint
            $table->integer('id_pendingformation')->change();
            // Ajoutez la contrainte de clé étrangère
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
        Schema::table('pendingvideos', function (Blueprint $table) {
            $table->dropForeign(['id_pendingformation']);
        });
    }
}
