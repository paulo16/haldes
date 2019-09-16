<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('description')->nullable();
            $table->text('note')->nullable();
            $table->string('etat')->nullable();
            $table->unsignedInteger('typedemande_id')->nullable();
            $table->unsignedInteger('halde_id')->nullable();
            $table->string('annuler')->nullable();
            $table->unsignedInteger('piece_id')->nullable();
            $table->unsignedInteger('personne_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('demandes', function (Blueprint $table) {
            $table->foreign('typedemande_id')->references('id')
                ->on('typedemandes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('demandes', function (Blueprint $table) {
            $table->foreign('halde_id')->references('id')
                ->on('haldes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('demandes', function (Blueprint $table) {
            $table->foreign('piece_id')->references('id')
                ->on('pieces')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('demandes', function (Blueprint $table) {
            $table->foreign('personne_id')->references('id')
                ->on('personnes')
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
        Schema::table('demandes', function (Blueprint $table) {
            $table->dropForeign(['typedemande_id']);
            $table->dropForeign(['halde_id']);
            $table->dropForeign(['piece_id']);
            $table->dropForeign(['personne_id']);

        });

        Schema::dropIfExists('demandes');
    }
}
