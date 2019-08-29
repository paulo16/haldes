<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperatives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nombre_membres')->nullable();
            $table->unsignedInteger('structure_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('cooperatives', function (Blueprint $table) {
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
        Schema::table('cooperatives', function (Blueprint $table) {
            $table->dropForeign(['structure_id']);
        });

        Schema::dropIfExists('cooperatives');
    }
}
