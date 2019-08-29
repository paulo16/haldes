<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStructureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('siege')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->unsignedInteger('nationalite')->nullable();
            $table->string('capital')->nullable();
            $table->string('description')->nullable();
            $table->string('date_creation_structure')->nullable();
            $table->unsignedInteger('typestructure_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('structures', function (Blueprint $table) {
            $table->foreign('typestructure_id')->references('id')
                ->on('typestructures')
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
        Schema::table('structures', function (Blueprint $table) {
            $table->dropForeign(['typestructure_id']);
        });

        Schema::dropIfExists('structures');
    }
}
