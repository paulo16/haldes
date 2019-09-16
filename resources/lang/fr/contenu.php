<?php
return [
    'demande' => [

        'nom_halde'                                             => 'Nom',
        'nom_region'                                            => 'Region',
        'coordonnees'                                           => 'Coordonnées',
        'nom_province'                                          => 'Province',
        'qte_dechets'                                           => 'Qte estimative',
        'action_reserver'                                       => 'reserver',

        'nom_resp'                                              => 'Nom resp',
        'nom_site'                                              => 'Site',
        'site_coord'                                            => 'Coord',
        'site_region'                                           => 'Region',
        'site_province'                                         => 'Province',
        'date_demande'                                          => 'Date Demande',
        'etat'                                                  => 'Etat',
        'identifiant'                                           => 'Identifiant',
        'action'                                           => 'action',
        'carte'                                           => 'carte',
        'substances'                                           => 'substances',
        'info_complementaires'                                           => 'informations',
        'publication'                                           => 'publication',
        'reserver'                                           => 'reserver',
        'annuler'                                           => 'demande annulée',
        'sub_annuler' => 'votre demande est annulée',
        'sure' => 'Etes-vous sûr ?'

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
        'qtedechets' => 'qte estimative',
        'substances' => 'substances',
        'action' => 'action',
    ],

    'home' => [
        'titre_header' => 'Haldes | Accueil',
        'enregistrer_vous' => 'Enregistez-vous sur la plateforme',
        'verif_email' => "verifier vos emails pour l'activation du compte.",
        'connectez_vous' => 'Connectez-Vous',
        'explorez' => ' Pour explorer votre profil.',
        'msg_faitedemande' => 'Faites vos demandes',
        'msg_utliserhalde' => "Utiliser la plateforme pour faire vos demandes de permis d'exploitation de site
        (haldes ou terrils) .",
        'msg_suivez' => "Suivez vos demandes",
        'msg_controler' => " Controler en temps reél l'état de vos demandes.",
        'msg_enreg' => "ENREGISTREZ-VOUS",
        'msg_suivdem' => "SUIVEZ VOS DEMANDES",

    ],
    'nav' => [
        'accueil' => "Accuiel",
        'suivi' => "SUIVI",
        'DECONNEXION' => "DECONNEXION",
        'CONNEXION' => "CONNEXION",
        'ADMIN' => "ADMIN",
        'CONTACT' => "CONTACT",
        'lang' => "Langues",
        'fr' => "Français",
        'ar' => "Arabe",
        'INSCRIRE' => "S'INSCRIRE ",
    ],
    'sidemenu' => [
        'PROFIL' => "PROFIL",
        'COMPTE' => "MON COMPTE",
        'DEMANDES' => "MES DEMANDES",
        'CREATEDEM' => "CREATION DEMANDE",
    ],
    'adddemande' => [
        'titre_header' => "Haldes | faire demande",
        'suivi' => "SUIVI DES DEMANDES",
        'explorez' => "Explorez les onglets",
        'demande' => "MES DEMANDES",
        'faites_demande' => "FAITES VOTRE DEMANDE",
        'type_demande' => "TYPE DE DEMANDE",
        'soumettre' => "SOUSMETTRE LA DEMANDE",
    ],

    'contact' => [
        'titre_header' => "Haldes | ccontact",
        'contact_nous' => "CONTACTEZ NOUS",
        'contact_besoin' => "Au besoin",
        'envoye_msg' => "Envoyez votre message",
    ],

    'importhalde' => [
        'site' => "les cellules de la colonne site doivent etre non vide",
        'x' => "les cellules de la colonne x doivent etre non vide",
        'y' => "les cellules de la colonne y doivent etre non vide",
        'carte' => "les cellules de la colonne carte doivent etre non vide",
        'province' => "les cellules de la colonne province doivent etre non vide",
        'region' => "les cellules de la colonne region doivent etre non vide",
        'dechets' => "les cellules de la colonne dechets doivent etre non vide",
        'substances' => "les cellules de la colonne substances doivent etre non vide",
        'informations' => "les cellules de la colonne informations doivent etre non vide",
    ],

    'groupe' => [
        'date_publication' => "date publication",
        'date_fin_publication' => "date fin publication",
        'nom' => "nom",
        'action' => "action",
        /////////sweet alert ///////////
        'oops' => 'Petit Problème, ',
        'problem_server' => 'coté serveur ,veillez réessayer !',
        'sure' => 'Etês-vous sûr de vouloir (dé)publier cette liste ?',
        'subtext_sure' => 'Tous les haldes appartenant à cette liste seront (dé)publiés !',
        'confirm_btn' => 'Oui, je veux (dé)publier !',
        'cancel_btn' => 'Non, Annuler !',
        'publier' => 'Liste (dé)publier !',
        'sub_publier' => '',
        'impossible' => 'Impossible de supprimer cette liste',
        'sub_impossible' => 'Les élements de cette liste sont surement utilisés dans une demande',
        'publier' => 'Liste (dé)publier !',
        'sub_publier' => '',
        'impossible_pub' => 'Impossible de (dé)publier cette liste',
        'sub_impossible_pub' => 'Il est possible que certains élements soient déja utilisés  dans les demande de haldes',
    ],

    'profil' => [
        'modifier' => 'Modifier votre profil',
        'sure' => 'Confirmez les informations de votre profil',
        'subtext_sure' => "Avant de continuer vous devez verifier les informations de votre compte, si elles ne sont pas exactes vueillez les modifier avant de continuer, car une fois votre demande faites vous ne pourriez plus modifier vos informations",
        'confirm_btn' => 'je confirme',
        'confirm_btn_lu' => 'je confirme avoir lu',
        'cancel_btn' => 'annuler',
        'infodemande' => 'Note importante à savoir !',
        'sub_infodemande' => "Vous devez savoir que après la soumission de votre demande vous de pourriez plus éffectuer de demande avant une la nouvelle publication de haldes(terrils)",
        'impossible' => 'Vous ne pouvez pas faire de demande pour le moment ',
        'sub_impossible' => 'Vous avez des demandes en cours, vueillez patienter , merci !',

    ],
    'alert'   => [
        /////////sweet alert ///////////
        'oops'            => 'Petit Problème, ',
        'problem_server'  => 'coté serveur ,veillez réessayer !',
        'demande_titre'   => 'Demande',
        'demande_message' => 'Demande bien éffectuée !',
        'sure'            => 'Engagement',
        'subtext_sure'    => 'Après envoi de votre demande vous ne pourriez plus faire de demande pendant un certains temps !',
        'confirm_btn'     => 'Oui, engagement confirmé !',
        'cancel_btn'      => 'Non, Annuler !',
        'env_imp'         => 'envoi impossible!',
        'sub_env'         => 'demande envoyée, vueillez consulter votre mail regulièrement pour recevoir notre reponse dans les 10 jours !',
    ],

    'errors' => [
        'if' => "Si date de creation entreprise est inférieur à une année saisissez AUCUNE sinon inserer IF",

        'password' => " Votre mot de passe doit comporter plus de 8 caractères et au moins 1 caractère
         majuscule, 1 minuscule, 1 caractère numérique et 1 caractère spécial.",
    ],

    'page_view_halde' => [
        'nom_halde' => 'nom',
        'coordonnees' => 'coordonnees',
        'personne' => 'personne',
        'reserver' => 'reserver ?',
        'annuler' => 'annuler ?',
    ],



];
