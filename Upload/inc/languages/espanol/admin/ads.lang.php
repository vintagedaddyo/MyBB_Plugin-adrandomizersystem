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

$l['ads_PName'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_PDesc'] = 'Este sistema muestra un anuncio en la parte inferior de su foro y gira a traves de una lista de anuncios.';
$l['ads_PWeb'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PAuth'] = 'Nitemare & updated by Vintagedaddyo';
$l['ads_PAuthSite'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PVer'] = '5.0.3';
$l['ads_PGUID'] = '80d9be40af59e71edb421b93e820b10f';
$l['ads_PCompat'] = '18*';

// submenu acp

$l['ads_submenu_title'] = 'Ad Rotation Manager';

// acp action

$l['ads_submenu_action_'] = '';

// tabla de encabezado de salida principal

$l['ads_table_output'] = 'Sistema de aleatorizacion de anuncios: Principal';

// encabezado de salida de tabla agregar

$l['ads_table_output_add'] = 'Sistema de Ad Randomizer: Anadir';

// encabezado de salida de tabla editar

$l['ads_table_output_edit'] = 'Sistema de Ad Randomizer: Editar';

// reinicio del encabezado de salida de la tabla

$l['ads_table_output_reset'] = 'Sistema de Ad Randomizer: Restablecer';

// encabezado de salida de tabla eliminar

$l['ads_table_output_delete'] = 'Sistema de Ad Randomizer: Eliminar';


// añadir opciones de anuncios

$l['ads_add_breadcrumb'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_add_header'] = 'Sistema de gestion de aleatorizacion de anuncios';

// opciones de anuncio do_add

$l['ads_do_add_breadcrumb'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_do_add_header'] = 'Sistema de gestion de aleatorizacion de anuncios';

$l['ads_do_add_flash_error_notice'] = 'Debe ingresar el codigo del anuncio';
$l['ads_do_add_flash_error'] = 'error';

$l['ads_do_add_flash_success_notice'] = 'Anuncio agregado exitosamente.';
$l['ads_do_add_flash_success'] = 'exito';

// editar opciones de anuncios

$l['ads_edit_breadcrumb'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_edit_header'] = 'Sistema de gestion de aleatorizacion de anuncios';

$l['ads_edit_flash_error_notice'] = 'Debe seleccionar un anuncio para editar primero';
$l['ads_edit_flash_error'] = 'error';

// opciones de anuncio do_edit

$l['ads_do_edit_breadcrumb'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_do_edit_header'] = 'Sistema de gestion de aleatorizacion de anuncios';

$l['ads_do_edit_flash_code_error_notice'] = 'Debe ingresar el codigo del anuncio';
$l['ads_do_edit_flash_code_error'] = 'error';

$l['ads_do_edit_flash_success_title'] = 'Mensaje con ID:';
$l['ads_do_edit_flash_success_notice'] = 'editado con éxito.';
$l['ads_do_edit_flash_success'] = 'exito';


// restablecer las opciones de anuncios

$l['ads_reset_breadcrumb'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_reset_header'] = 'Sistema de gestion de aleatorizacion de anuncios';

$l['ads_reset_flash_error_notice'] = 'Usted debe seleccionar un Puno de anuncio';
$l['ads_reset_flash_error'] = 'error';

$l['ads_reset_header'] = 'Restablecer controles de anuncios';
$l['ads_reset_message'] = '¿Esta seguro de que desea restablecer las vistas de publicidad para ID:';

$l['ads_reset_button_reset'] = 'Restablecer vistas';
$l['ads_reset_button_cancel'] = 'Cancelar';

// do_reset opciones de anuncios

$l['ads_do_reset_flash_reset_success_title'] = 'Vistas de anuncios con ID:';
$l['ads_do_reset_flash_reset_success_notice'] = 'restablecer con éxito.';
$l['ads_do_reset_flash_reset_success'] = 'exito';

$l['ads_do_reset_flash_disable_success_title'] = 'Anuncio con ID:';
$l['ads_do_reset_flash_disable_success_notice'] = 'deshabilitado con éxito.';
$l['ads_do_reset_flash_disable_success'] = 'exito';


$l['ads_do_reset_flash_mode_enable_success_title'] = 'Anuncio con ID:';
$l['ads_do_reset_flash_mode_enable_success_notice'] = 'habilitado exitosamente.';
$l['ads_do_reset_flash_mode_enable_success'] = 'exito';

$l['ads_do_reset_flash_mode_disable_success_title'] = 'Anuncio con ID:';
$l['ads_do_reset_flash_mode_disable_success_notice'] = 'deshabilitado con éxito.';
$l['ads_do_reset_flash_mode_disable_success'] = 'exito';

// eliminar opciones de anuncios

$l['ads_delete_breadcrumb'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_delete_header'] = 'Sistema de gestion de aleatorizacion de anuncios';

$l['ads_delete_flash_error_notice'] = 'Debe seleccionar un Puno de anuncio';
$l['ads_delete_flash_error'] = 'error';

$l['ads_delete_header_alert'] = 'Eliminar alerta';
$l['ads_delete_message'] = '¿Esta seguro de que desea eliminar el mensaje con ID:';

$l['ads_delete_button_delete'] = 'Borrar';
$l['ads_delete_button_cancel'] = 'Cancelar';


// do_delete opciones de anuncios

$l['ads_do_delete_breadcrumb'] = 'Anuncio del sistema de aleatorizacion';
$l['ads_do_delete_header'] = 'Sistema de gestion de aleatorizacion de anuncios';

$l['ads_do_delete_flash_success_title'] = 'Anuncio con ID:';
$l['ads_do_delete_flash_success_notice'] = 'eliminado con exito.';
$l['ads_do_delete_flash_success'] = 'exito';

$l['ads_do_delete_current_ads'] = 'Anuncios actuales';
$l['ads_do_delete_add_id'] = 'ID de anuncio';
$l['ads_do_delete_ad'] = 'Anuncio';
$l['ads_do_delete_mode'] = 'Modo';
$l['ads_do_delete_number_views'] = 'Numero de vistas';
$l['ads_do_delete_max_views'] = 'Vistas maximas';


$l['ads_mode_infinite'] = 'Infinito';
$l['ads_mode_limited'] = 'Limitado';
$l['ads_mode_disabled'] = 'Deshabilitado';
$l['ads_mode_expired'] = 'Caducado';
$l['ads_mode_error'] = 'Error!';

$l['ads_button_add'] = 'Anadir';
$l['ads_button_edit'] = 'Editar';
$l['ads_button_disable_enable'] = 'Desactivar / Activar';
$l['ads_button_reset_view'] = 'Restablecer vista';
$l['ads_button_delete'] = 'Borrar';

// complemento formulario agregar

$l['ads_image_path_full'] = 'http://tu-completo-completo-imagen-camino-aqui';

$l['ads_add_advertisement'] = 'Anadir anuncio';
$l['ads_add_advertisement_message'] = 'Numero maximo de vistas antes de que se elimine el anuncio (0 para infinito)<br />';

$l['ads_add_advertisement_add_button'] = 'Anadir';
$l['ads_add_advertisement_reset_button'] = 'Reiniciar';

// edicion del formulario del plugin

$l['ads_edit_advertisement'] = 'Editar Anuncio';
$l['ads_edit_advertisement_message'] = 'Numero maximo de vistas antes de que se elimine el anuncio (0 para infinito)<br />';

$l['ads_edit_advertisement_edit_button'] = 'Editar';
$l['ads_edit_advertisement_reset_button'] = 'Reiniciar';

?>
