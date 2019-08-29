<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotHaldeSubstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halde_substanceexploitee', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('halde_id')->nullable();
            $table->unsignedInteger('substance_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('halde_substanceexploitee', function (Blueprint $table) {
            $table->foreign('halde_id')->references('id')
                ->on('haldes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('halde_substanceexploitee', function (Blueprint $table) {
            $table->foreign('substance_id')->references('id')
                ->on('substanceexploitees')
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
        Schema::table('halde_substanceexploitee', function (Blueprint $table) {
            $table->dropForeign(['halde_id']);
            $table->dropForeign(['substance_id']);

        });

        Schema::dropIfExists('halde_substanceexploitee');
    }
}
