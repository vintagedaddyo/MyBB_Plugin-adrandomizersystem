<?php
/***********************************************

Ad Randomizer system

Created by Nitemare
http://www.nitemare.ca

Release date: 16th September 2007

edited by: vintagedaddyo
http://community.mybb.com/user-6029.html

last edited: 9th March 2019

************************************************/


// Plugin info

$l['ads_PName'] = 'Système d\'annotation aléatoire';
$l['ads_PDesc'] = 'Ce système affiche une annonce au bas de votre forum et fait défiler une liste d’annonces.';
$l['ads_PWeb'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PAuth'] = 'Nitemare & Mis a jour par Vintagedaddyo';
$l['ads_PAuthSite'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PVer'] = '5.0.3';
$l['ads_PGUID'] = '80d9be40af59e71edb421b93e820b10f';
$l['ads_PCompat'] = '18*';

// sous-menu acp

$l['ads_submenu_title'] = 'Gestionnaire de rotation des annonces';

// action acp

$l['ads_submenu_action_'] = '';

// en-tête de sortie de table main

$l['ads_table_output'] = 'Système d\'annonce aléatoire: Principal';

// en-tête de sortie de la table add

$l['ads_table_output_add'] = 'Système d\'annonce aléatoire: Ajouter';

// en-tête de la sortie de la table edit

$l['ads_table_output_edit'] = 'Système d\'annonce aléatoire: Modifier';

// réinitialisation de l'en-tête de sortie de la table

$l['ads_table_output_reset'] = 'Système d\'annonce aléatoire: réinitialiser';

// en-tête de sortie de table delete

$l['ads_table_output_delete'] = 'Système d\'annonce aléatoire: Supprimer';


// ajouter des options d'annonce

$l['ads_add_breadcrumb'] = 'Système d\'annonce aléatoire';
$l['ads_add_header'] = 'Système de gestion des annonces aléatoires';

// options de publicité do_add

$l['ads_do_add_breadcrumb'] = 'Système d\'annonce aléatoire';
$l['ads_do_add_header'] = 'Système de gestion des annonces aléatoire';

$l['ads_do_add_flash_error_notice'] = 'Vous devez entrer le code de l\'annonce';
$l['ads_do_add_flash_error'] = 'error';

$l['ads_do_add_flash_success_notice'] = 'Annonce ajoutée avec succès.';
$l['ads_do_add_flash_success'] = 'success';

// modifier les options d'annonce

$l['ads_edit_breadcrumb'] = 'Système d\'annonce aléatoire';
$l['ads_edit_header'] = 'Système de gestion des annonces aléatoires';

$l['ads_edit_flash_error_notice'] = 'Vous devez sélectionner une annonce à modifier en premier';
$l['ads_edit_flash_error'] = 'error';

// options de publicité do_edit

$l['ads_do_edit_breadcrumb'] = 'Système d\'annonce aléatoire';
$l['ads_do_edit_header'] = 'Système de gestion des annonces aléatoires';

$l['ads_do_edit_flash_code_error_notice'] = 'Vous devez entrer le code de l\'annonce';
$l['ads_do_edit_flash_code_error'] = 'error';

$l['ads_do_edit_flash_success_title'] = 'Message avec ID:';
$l['ads_do_edit_flash_success_notice'] = 'édité avec succès.';
$l['ads_do_edit_flash_success'] = 'success';


// réinitialiser les options d annonce

$l['ads_reset_breadcrumb'] = 'Système d\'annonce aléatoire';
$l['ads_reset_header'] = 'Système de gestion des annonces aléatoires';

$l['ads_reset_flash_error_notice'] = 'Vous devez sélectionner un poing publicitaire';
$l['ads_reset_flash_error'] = 'error';

$l['ads_reset_header'] = 'Réinitialiser les vues d\'annonce';
$l['ads_reset_message'] = 'Êtes-vous sûr de vouloir réinitialiser les vues de la publicité pour ID:';

$l['ads_reset_button_reset'] = 'Réinitialiser les vues';
$l['ads_reset_button_cancel'] = 'Annuler';

// do_reset options d'annonce

$l['ads_do_reset_flash_reset_success_title'] = 'Vues d\'annonces avec ID:';
$l['ads_do_reset_flash_reset_success_notice'] = 'réinitialiser avec succès.';
$l['ads_do_reset_flash_reset_success'] = 'success';

$l['ads_do_reset_flash_disable_success_title'] = 'Annonce avec ID:';
$l['ads_do_reset_flash_disable_success_notice'] = 'désactivé avec succès.';
$l['ads_do_reset_flash_disable_success'] = 'success';


$l['ads_do_reset_flash_mode_enable_success_title'] = 'Annonce avec identifiant:';
$l['ads_do_reset_flash_mode_enable_success_notice'] = 'activé avec succès.';
$l['ads_do_reset_flash_mode_enable_success'] = 'succès';

$l['ads_do_reset_flash_mode_disable_success_title'] = 'Annonce avec identifiant:';
$l['ads_do_reset_flash_mode_disable_success_notice'] = 'désactivé avec succès.';
$l['ads_do_reset_flash_mode_disable_success'] = 'succès';

// supprimer les options d'annonce

$l['ads_delete_breadcrumb'] = 'Système d\'annonce aléatoire';
$l['ads_delete_header'] = 'Système de gestion des annonces aléatoire';

$l['ads_delete_flash_error_notice'] = 'Vous devez sélectionner un poing publicitaire';
$l['ads_delete_flash_error'] = 'error';

$l['ads_delete_header_alert'] = 'Supprimer l\'alerte';
$l['ads_delete_message'] = 'Êtes-vous sûr de vouloir supprimer le message avec l\'ID:';

$l['ads_delete_button_delete'] = 'Supprimer';
$l['ads_delete_button_cancel'] = 'Annuler';


// do_delete options d annonce

$l['ads_do_delete_breadcrumb'] = 'Système d\'annonce aléatoire';
$l['ads_do_delete_header'] = 'Système de gestion des annonces aléatoires';

$l['ads_do_delete_flash_success_title'] = 'Annonce avec identifiant:';
$l['ads_do_delete_flash_success_notice'] = 'supprimé avec succès.';
$l['ads_do_delete_flash_success'] = 'success';

$l['ads_do_delete_current_ads'] = 'Annonces actuelles';
$l['ads_do_delete_add_id'] = 'N ° d\'annonce';
$l['ads_do_delete_ad'] = 'Ad';
$l['ads_do_delete_mode'] = 'Mode';
$l['ads_do_delete_number_views'] = 'Nombre de vues';
$l['ads_do_delete_max_views'] = 'Vues maximales';


$l['ads_mode_infinite'] = 'Infini';
$l['ads_mode_limited'] = 'Limité';
$l['ads_mode_disabled'] = 'Désactivé';
$l['ads_mode_expired'] = 'Expiré';
$l['ads_mode_error'] = 'Erreur!';

$l['ads_button_add'] = 'Ajouter';
$l['ads_button_edit'] = 'Modifier';
$l['ads_button_disable_enable'] = 'Désactiver / Activer';
$l['ads_button_reset_view'] = 'Réinitialiser la vue';
$l['ads_button_delete'] = 'Supprimer';

// plugin form add

$l['ads_image_path_full'] = 'http://votre-image-complete-chemin-ici';

$l['ads_add_advertisement'] = 'Ajouter une publicité';
$l['ads_add_advertisement_message'] = 'Nombre maximal de vues avant la suppression de l\'annonce (0 pour l\'infini) <br />';

$l['ads_add_advertisement_add_button'] = 'Ajouter';
$l['ads_add_advertisement_reset_button'] = 'Réinitialiser';

// formulaire de plugin edit

$l['ads_edit_advertisement'] = 'Modifier la publicité';
$l['ads_edit_advertisement_message'] = 'Nombre maximal de vues avant que l\'annonce soit supprimée (0 pour l\'infini) <br />';

$l['ads_edit_advertisement_edit_button'] = 'Modifier';
$l['ads_edit_advertisement_reset_button'] = 'Réinitialiser';

?>
