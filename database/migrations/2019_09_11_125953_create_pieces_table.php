<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nature');
            $table->date('validite');
            $table->string('nom_autorite'); /* Nom de l'autorite reglementation emettrice */
            $table->string('nom_responsable'); /* Nom du Responsable de cette autorite */
            $table->string('pays');
            $table->string('adresse');
            $table->string('contact');
            $table->date('mise_a_jour'); /** Date de la derniere mise a jour du document */
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id')->references('id')->on('demandes');
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
        Schema::dropIfExists('pieces');
    }
}
