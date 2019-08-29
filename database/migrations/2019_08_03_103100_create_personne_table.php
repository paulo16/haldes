<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('cin')->nullable();
            $table->unsignedInteger('nationalite')->nullable();
            $table->string('adresse')->nullable();
            $table->string('telephone_fixe')->nullable();
            $table->string('mobile')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('structure_id')->nullable();
            $table->unsignedInteger('part_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('personnes', function (Blueprint $table) {
            $table->foreign('structure_id')->references('id')
                ->on('structures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('personnes', function (Blueprint $table) {
            $table->foreign('part_id')->references('id')
                ->on('partsociales')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('personnes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')
                ->on('users')
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

        Schema::table('personnes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['part_id']);
            $table->dropForeign(['structure_id']);

        });
        Schema::dropIfExists('personnes');
    }
}
