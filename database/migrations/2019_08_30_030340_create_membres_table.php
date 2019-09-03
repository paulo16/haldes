<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('email');
            $table->string('telephone');
            $table->unsignedInteger('cooperative_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('membres', function (Blueprint $table) {
            $table->foreign('cooperative_id')->references('id')
                ->on('cooperatives')
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

        Schema::table('membres', function (Blueprint $table) {
            $table->dropForeign(['cooperative_id']);
        });

        Schema::dropIfExists('membres');
    }
}
