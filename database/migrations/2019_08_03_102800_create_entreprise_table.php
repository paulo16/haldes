<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepriseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->string('raison_social')->nullable();
            $table->string('email_entreprise')->nullable();
            $table->string('nom_gerant')->nullable();
            $table->string('prenom_gerant')->nullable();
            $table->string('email_gerant')->nullable();
            $table->string('adresse_gerant')->nullable();
            $table->string('tel_gerant')->nullable();
            $table->string('registre_commerce')->nullable();
            $table->unsignedInteger('nombre_actionnaires')->nullable();
            $table->string('ice')->nullable();
            $table->string('cnss')->nullable();
            $table->string('if')->nullable();
            $table->unsignedInteger('structure_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('entreprises', function (Blueprint $table) {
            $table->foreign('structure_id')->references('id')
                ->on('structures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('entreprises', function (Blueprint $table) {
            $table->dropForeign(['structure_id']);
        });

        Schema::dropIfExists('entreprises');
    }
}
