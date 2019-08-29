<?php
return [
    'demande' => [
        'confirmer_depot_pieces_titre'                          => 'Vous devez fournir les pièces ci dessous dans un delai de 10 jours :',
        'piece1_diplomes_references'                            => "Diplômes, titres et références professionnelles du  personnel de l’entreprise ou de la coopérative minière chargés de la conduite et du suivi des travaux ou, éventuellement, les contrats le liant aux personnes physiques ou morales agréées visées à l’article 58 de la loi n°33-13 ",
        'piece2_moyens_humain_technique'                        => "Moyens humains et techniques envisagés pour l’exécution des travaux",
        'piece3_capacites_techniques_financires'                => "Les pièces justifiant que l’entreprise ou la coopérative minière dispose des capacités techniques et financières ",
        'piece4_troisderniers_bilans_comptes'                   => "Les trois derniers bilans et comptes de l’entreprise ou de la coopérative minière ",
        'piece5_listemateriels_detenu_ou_acquerir'              => "Liste et valeur du matériel détenu par le demandeur ou que celui-ci envisage d’acquérir et le financement correspondant",
        'piece6_garanties_cautions'                             => "Garanties et cautions dont bénéficie l’entreprise ou la coopérative minière, le cas éventuel ",
        'piece7_fiche_descrip_entreprise_plus_representant'     => "Fiche indiquant la dénomination de la personne morale, sa forme juridique, son siège social et le nom, prénom, qualité et domicile de son représentant ",
        'piece8_pieces_administratives_obligations_cotisations' => "Pièces administratives délivrées par les autorités compétentes et justifiant que le demandeur est en règle au regard de ses obligations fiscales et cotisations sociales",
        'piece9_qualite_mandataire'                             => "Une pièce attestant de la qualité de mandataire de la personne morale au cas où la demande est formulée par un mandataire",
        'piece10_plan_trois_exemplaire'                         => "Un plan en en trois (3) exemplaires, à une échelle adéquat, indiquant les limites du périmètre objet de la demande de l’autorisation d’exploitation des haldes et terrils en coordonnées Lambert ainsi que sa forme et sa superficie",
        'piece11_recepisse_versement_service_mine'              => "Récépissé du versement de la rémunération des services rendus par l’administration chargée des mines, au titre de l’institution de l’autorisation d’exploitation des haldes et terrils",
        'piece12_engagement_etude_environnement'                => "Un engagement de réaliser l’étude d’impact sur l’environnement et de présenter la décision d’acceptabilité environnementale, dans un délai d’un an à compter de la date de la délivrance de l’autorisation d’exploitation des haldes et terrils ",

        'nom_halde'                                             => 'Nom',
        'nom_region'                                            => 'Region',
        'coordonnees'                                           => 'Coordonnées',
        'nom_province'                                          => 'Province',
        'qte_dechets'                                           => 'Qte déchets',
        'action_reserver'                                       => 'reserver',

        'nom_resp'                                              => 'Nom resp',
        'nom_site'                                              => 'Site',
        'site_coord'                                            => 'Coord',
        'site_region'                                           => 'Region',
        'site_province'                                         => 'Province',
        'date_demande'                                          => 'Date Demande',
        'etat'                                                  => 'Etat',
        'identifiant'                                           => 'Identifiant',

    ],

    'alert'   => [
        /////////sweet alert ///////////
        'oops'            => 'Petit Problème, ',
        'problem_server'  => 'coté serveur ,veillez réessayer !',
        'demande_titre'   => 'Demande',
        'demande_message' => 'Demande bien éffectuée !',
        'sure'            => 'Etês-vous sûr de votre choix de site(terrils) ?',
        'subtext_sure'    => 'Après envoi de votre demande vous ne pourriez plus faire de demande pendant un certains temps !',
        'confirm_btn'     => 'Oui, envoyer !',
        'cancel_btn'      => 'Non, Annuler !',
        'env_imp'         => 'envoi impossible!',
        'sub_env'         => 'demande envoyée, vueillez consulter votre mail regulièrement pour recevoir notre reponse dans les 10 jours !',
    ],
    "admin" => [
        'config' => 'Paramètres',
        'sign_in' => 'Se connecter',
        'log_out' => 'Se déconnecter',
        'page_connexion' => 'Page connection',
        'connexion_description' => 'connexion utilisateur',

        /////////sweet alert ///////////
        'oops' => 'Petit Problème, ',
        'problem_server' => 'coté serveur ,veillez réessayer !',
        'ajout_titre' => 'Ajout',
        'ajout_message' => 'Ajout bien éffectué !',
        'update_titre' => 'Editer',
        'update_message' => 'Mise à jour bien éffectué !',
        'sure' => 'Etês-vous sûr ?',
        'subtext_sure' => 'Vous ne pourriez plus recuperer cette ligne après  celà !',
        'confirm_btn' => 'Oui, supprimer !',
        'cancel_btn' => 'Non, Annuler !',
        'sup_imp' => 'suppression impossible!',
        'sub_sup' => 'ligne supprimée !',
        'supprime' => 'Supprimée !',
        'oops' => 'Oops!',
        'problem_server' => 'Probleme côté server.',

        ////////////// User ////////////////
        'action' => 'Action',
        'user_nom' => 'Nom',
        'user_prenom' => 'Prenom',
        'user_email' => 'Email',
        'user_date' => 'Date création',
        'user_role' => 'Role',
        'user_pays' => 'Pays',
    ],

    'substance' => [
        'nom' => 'nom',
        'description' => 'description',
        'action' => 'action',
    ],

    'halde' => [
        'nom' => 'nom',
        'coordonnees' => 'coordonnees',
        'region' => 'regions',
        'province' => 'provinces',
        'qtedechets' => 'qte dechets',
        'substances' => 'substances',
        'action' => 'action',
    ],
];
