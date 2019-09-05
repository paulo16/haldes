<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupehaldes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupehaldes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_publication')->nullable();
            $table->timestamp('date_publication',2)->nullable();
            $table->timestamp('date_fin_publication',2)->nullable();

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
        Schema::dropIfExists('groupehaldes');
    }
}
