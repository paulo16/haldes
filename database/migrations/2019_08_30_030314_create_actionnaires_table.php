<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('adresse')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('part_social')->nullable();
            $table->unsignedInteger('entreprise_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('actionnaires', function (Blueprint $table) {
            $table->foreign('entreprise_id')->references('id')
                ->on('entreprises')
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
        Schema::table('actionnaires', function (Blueprint $table) {
            $table->dropForeign(['entreprise_id']);
        });

        Schema::dropIfExists('actionnaires');
    }
}
