<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaldeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('haldes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom')->nullable();
            $table->string('coordonnees')->nullable();
            $table->text('carte')->nullable();
            $table->text('substance_noms')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('province_noms')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->text('qte_dechets')->nullable();
            $table->text('info_complementaires')->nullable();
            $table->unsignedBigInteger('groupe_id')->nullable();
            $table->timestamps(2);
        });

        Schema::table('haldes', function (Blueprint $table) {
            $table->foreign('groupe_id')->references('id')
                ->on('groupehaldes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });



        // Schema::table('haldes', function (Blueprint $table) {
        //     $table->foreign('province_id')->references('id')
        //         ->on('provinces')
        //         ->onDelete('SET NULL')
        //         ->onUpdate('SET NULL');
        // });

        Schema::table('haldes', function (Blueprint $table) {
            $table->foreign('region_id')->references('id')
                ->on('regions')
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
        Schema::table('haldes', function (Blueprint $table) {
            $table->dropForeign(['groupe_id']);
            $table->dropForeign(['region_id']);
        });

        Schema::dropIfExists('haldes');
    }
}
