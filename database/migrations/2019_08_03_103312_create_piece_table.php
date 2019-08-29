<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePieceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pieces', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('piece1_diplomes_references')->nullable();
            $table->boolean('piece2_moyens_humain_technique')->nullable();
            $table->boolean('piece3_capacites_techniques_financires')->nullable();
            $table->boolean('piece4_troisderniers_bilans_comptes')->nullable();
            $table->boolean('piece5_listemateriels_detenu_ou_acquerir')->nullable();
            $table->boolean('piece6_garanties_cautions')->nullable();
            $table->boolean('piece7_fiche_descrip_entreprise_plus_representant')->nullable();
            $table->boolean('piece8_pieces_administratives_obligations_cotisations')->nullable();
            $table->boolean('piece9_qualite_mandataire')->nullable();
            $table->boolean('piece10_plan_trois_exemplaire')->nullable();
            $table->boolean('piece11_recepisse_versement_service_mine')->nullable();
            $table->string('numero_virement')->nullable();
            $table->string('lieu_virement')->nullable();
            $table->date('date_virement')->nullable();
            $table->boolean('piece12_engagement_etude_environnement')->nullable();

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

        Schema::dropIfExists('pieces');
    }
}
