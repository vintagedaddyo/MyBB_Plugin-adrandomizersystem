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

$l['ads_PName'] = 'Sistema di annunci randomizzati';
$l['ads_PDesc'] = 'Questo sistema visualizza un annuncio nella parte inferiore del tuo forum e ruota attraverso un elenco di annunci';
$l['ads_PWeb'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PAuth'] = 'Nitemare & Aggiornato da Vintagedaddyo';
$l['ads_PAuthSite'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PVer'] = '5.0.3';
$l['ads_PGUID'] = '80d9be40af59e71edb421b93e820b10f';
$l['ads_PCompat'] = '18*';

// sottomenu ACP

$l['ads_submenu_title'] = 'Ad Rotation Manager';

// azione acp

$l['ads_submenu_action_'] = '';

// intestazione dell'output della tabella principale

$l['ads_table_output'] = 'Sistema Randomizer annunci: Principale';

// table output header add

$l['ads_table_output_add'] = 'Sistema Randomizer annunci: Aggiungi';

// modifica dell'intestazione dell'output della tabella

$l['ads_table_output_edit'] = 'Sistema Randomizer annunci: Modifica';

// reset dell'intestazione dell'output della tabella

$l['ads_table_output_reset'] = 'Sistema Randomizer annunci: Ripristina';

// table output header delete

$l['ads_table_output_delete'] = 'Sistema Randomizer annunci: Elimina';


// aggiungi opzioni pubblicitarie

$l['ads_add_breadcrumb'] = 'Sistema Ad Randomizer';
$l['ads_add_header'] = 'Sistema di gestione degli annunci randomizzati';

// do_add opzioni pubblicitarie

$l['ads_do_add_breadcrumb'] = 'Sistema di Randomizer annunci';
$l['ads_do_add_header'] = 'Sistema di gestione degli annunci randomizzati';

$l['ads_do_add_flash_error_notice'] = 'Devi inserire il codice per l\'annuncio';
$l['ads_do_add_flash_error'] = 'errore';

$l['ads_do_add_flash_success_notice'] = 'Annuncio aggiunto con successo.';
$l['ads_do_add_flash_success'] = 'successo';

// modifica le opzioni degli annunci

$l['ads_edit_breadcrumb'] = 'Sistema di Randomizer annunci';
$l['ads_edit_header'] = 'Sistema di gestione degli annunci randomizzati';

$l['ads_edit_flash_error_notice'] = 'Devi selezionare un annuncio da modificare per primo';
$l['ads_edit_flash_error'] = 'errore';

// do_edit opzioni di annunci

$l['ads_do_edit_breadcrumb'] = 'Sistema Ad Randomizer';
$l['ads_do_edit_header'] = 'Sistema di gestione degli annunci randomizzati';

$l['ads_do_edit_flash_code_error_notice'] = 'Devi inserire il codice per l\'annuncio';
$l['ads_do_edit_flash_code_error'] = 'errore';

$l['ads_do_edit_flash_success_title'] = 'Messaggio con ID: ';
$l['ads_do_edit_flash_success_notice'] = 'modificato con successo.';
$l['ads_do_edit_flash_success'] = 'successo';


// reimposta le opzioni degli annunci

$l['ads_reset_breadcrumb'] = 'Sistema Ad Randomizer';
$l['ads_reset_header'] = 'Sistema di gestione degli annunci randomizzati';

$l['ads_reset_flash_error_notice'] = 'Devi selezionare un pugno dell\'annuncio';
$l['ads_reset_flash_error'] = 'errore';

$l['ads_reset_header'] = 'Ripristina visualizzazioni annunci';
$l['ads_reset_message'] = 'Sei sicuro di voler ripristinare le viste della pubblicità per ID: ';

$l['ads_reset_button_reset'] = 'Ripristina viste';
$l['ads_reset_button_cancel'] = 'Annulla';

// do_reset opzioni di annunci

$l['ads_do_reset_flash_reset_success_title'] = 'Visualizzazioni annuncio con ID: ';
$l['ads_do_reset_flash_reset_success_notice'] = ' reimposta con successo.';
$l['ads_do_reset_flash_reset_success'] = 'successo';

$l['ads_do_reset_flash_disable_success_title'] = 'Annuncio con ID: ';
$l['ads_do_reset_flash_disable_success_notice'] = ' disabilitato con successo.';
$l['ads_do_reset_flash_disable_success'] = 'successo';


$l['ads_do_reset_flash_mode_enable_success_title'] = 'Annuncio con ID: ';
$l['ads_do_reset_flash_mode_enable_success_notice'] = ' abilitato con successo.';
$l['ads_do_reset_flash_mode_enable_success'] = 'successo';

$l['ads_do_reset_flash_mode_disable_success_title'] = 'Annuncio con ID: ';
$l['ads_do_reset_flash_mode_disable_success_notice'] = ' disabilitato con successo.';
$l['ads_do_reset_flash_mode_disable_success'] = 'successo';

// elimina le opzioni degli annunci

$l['ads_delete_breadcrumb'] = 'Sistema Ad Randomizer';
$l['ads_delete_header'] = 'Sistema di gestione degli annunci randomizzati';

$l['ads_delete_flash_error_notice'] = 'Devi selezionare un pugno dell\'annuncio';
$l['ads_delete_flash_error'] = 'errore';

$l['ads_delete_header_alert'] = 'Elimina avviso';
$l['ads_delete_message'] = 'Sei sicuro di voler eliminare il messaggio con ID: ';

$l['ads_delete_button_delete'] = 'Elimina';
$l['ads_delete_button_cancel'] = 'Annulla';


// do_delete opzioni pubblicitarie

$l['ads_do_delete_breadcrumb'] = 'Sistema Ad Randomizer';
$l['ads_do_delete_header'] = 'Sistema di gestione degli annunci randomizzati';

$l['ads_do_delete_flash_success_title'] = 'Annuncio con ID: ';
$l['ads_do_delete_flash_success_notice'] = ' cancellato con successo.';
$l['ads_do_delete_flash_success'] = 'successo';

$l['ads_do_delete_current_ads'] = 'Annunci attuali';
$l['ads_do_delete_add_id'] = 'ID annuncio';
$l['ads_do_delete_ad'] = 'Annuncio';
$l['ads_do_delete_mode'] = 'Modalità';
$l['ads_do_delete_number_views'] = 'Numero di visualizzazioni';
$l['ads_do_delete_max_views'] = 'Viste massime';


$l['ads_mode_infinite'] = 'Infinito';
$l['ads_mode_limited'] = 'Limitato';
$l['ads_mode_disabled'] = 'Disabled';
$l['ads_mode_expired'] = 'Scaduto';
$l['ads_mode_error'] = 'Errore!';

$l['ads_button_add'] = 'Aggiungi';
$l['ads_button_edit'] = 'Modifica';
$l['ads_button_disable_enable'] = 'Disabilita / Abilita';
$l['ads_button_reset_view'] = 'Ripristina vista';
$l['ads_button_delete'] = 'Elimina';

// modulo di plugin aggiungi

$l['ads_image_path_full'] = 'http://il-tuo-full-image-path-qui';

$l['ads_add_advertisement'] = 'Aggiungi pubblicità';
$l['ads_add_advertisement_message'] = 'Numero massimo di visualizzazioni prima che l\'annuncio sia cancellato (0 per infinito) <br />';

$l['ads_add_advertisement_add_button'] = 'Aggiungi';
$l['ads_add_advertisement_reset_button'] = 'Ripristina';

// modifica del modulo di plugin

$l['ads_edit_advertisement'] = 'Modifica pubblicità';
$l['ads_edit_advertisement_message'] = 'Numero massimo di visualizzazioni prima che l\'annuncio sia cancellato (0 per infinito) <br />';

$l['ads_edit_advertisement_edit_button'] = 'Modifica';
$l['ads_edit_advertisement_reset_button'] = 'Ripristina';

?>
