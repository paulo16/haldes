<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partsociales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre')->nullable();
            $table->unsignedInteger('qte_part')->nullable();
            $table->string('description')->nullable();
            $table->timestamps(2);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('partsociales');
    }
}
