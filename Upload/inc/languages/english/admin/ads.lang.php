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

$l['ads_PName'] = 'Ad Randomizer system';
$l['ads_PDesc'] = 'This system displays an ad the bottom of your forum, and rotates through a list of ads';
$l['ads_PWeb'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PAuth'] = 'Nitemare & updated by Vintagedaddyo';
$l['ads_PAuthSite'] = 'http://community.mybb.com/user-6029.html';
$l['ads_PVer'] = '5.0.3';
$l['ads_PGUID'] = '80d9be40af59e71edb421b93e820b10f';
$l['ads_PCompat'] = '18*';

// acp submenu

$l['ads_submenu_title'] ='Ad Rotation Manager';

// acp action

$l['ads_submenu_action_'] ='';

// table output header main

$l['ads_table_output'] = 'Ad Randomizer system: Main';

// table output header add

$l['ads_table_output_add'] = 'Ad Randomizer system: Add';

// table output header edit

$l['ads_table_output_edit'] = 'Ad Randomizer system: Edit';

// table output header reset

$l['ads_table_output_reset'] = 'Ad Randomizer system: Reset';

// table output header delete

$l['ads_table_output_delete'] = 'Ad Randomizer system: Delete';


// add ad options

$l['ads_add_breadcrumb'] ='Ad Randomizer system';
$l['ads_add_header'] ='Ad Randomizer Management system';

// do_add ad options

$l['ads_do_add_breadcrumb'] ='Ad Randomizer system';
$l['ads_do_add_header'] ='Ad Randomizer Management system';

$l['ads_do_add_flash_error_notice'] = 'You must enter the code for the Ad';
$l['ads_do_add_flash_error'] = 'error';

$l['ads_do_add_flash_success_notice'] = 'Ad added sucessfully.';
$l['ads_do_add_flash_success'] = 'success';

// edit ad options

$l['ads_edit_breadcrumb'] ='Ad Randomizer system';
$l['ads_edit_header'] ='Ad Randomizer Management system';

$l['ads_edit_flash_error_notice'] = 'You must select an ad to edit first';
$l['ads_edit_flash_error'] = 'error';

// do_edit ad options

$l['ads_do_edit_breadcrumb'] ='Ad Randomizer system';
$l['ads_do_edit_header'] ='Ad Randomizer Management system';

$l['ads_do_edit_flash_code_error_notice'] = 'You must enter the code for the Ad';
$l['ads_do_edit_flash_code_error'] = 'error';

$l['ads_do_edit_flash_success_title'] = 'Message with ID:';
$l['ads_do_edit_flash_success_notice'] = ' edited sucessfully.';
$l['ads_do_edit_flash_success'] = 'success';


// reset ad options

$l['ads_reset_breadcrumb'] ='Ad Randomizer system';
$l['ads_reset_header'] ='Ad Randomizer Management system';

$l['ads_reset_flash_error_notice'] = 'You mustselect an Ad fist';
$l['ads_reset_flash_error'] = 'error';

$l['ads_reset_header'] = 'Reset Ad Veiws';
$l['ads_reset_message'] = 'Are you sure you want to reset the advertisment views for ID:';

$l['ads_reset_button_reset'] = 'Reset Veiws';
$l['ads_reset_button_cancel'] = 'Cancel';

// do_reset ad options

$l['ads_do_reset_flash_reset_success_title'] = 'Ad views with ID:';
$l['ads_do_reset_flash_reset_success_notice'] = ' reset sucessfully.';
$l['ads_do_reset_flash_reset_success'] = 'success';

$l['ads_do_reset_flash_disable_success_title'] = 'Ad with ID:';
$l['ads_do_reset_flash_disable_success_notice'] = ' disabled sucessfully.';
$l['ads_do_reset_flash_disable_success'] = 'success';


$l['ads_do_reset_flash_mode_enable_success_title'] = 'Ad with ID:';
$l['ads_do_reset_flash_mode_enable_success_notice'] = ' enabled sucessfully.';
$l['ads_do_reset_flash_mode_enable_success'] = 'success';

$l['ads_do_reset_flash_mode_disable_success_title'] = 'Ad with ID:';
$l['ads_do_reset_flash_mode_disable_success_notice'] = ' disabled sucessfully.';
$l['ads_do_reset_flash_mode_disable_success'] = 'success';

// delete ad options

$l['ads_delete_breadcrumb'] ='Ad Randomizer system';
$l['ads_delete_header'] ='Ad Randomizer Management system';

$l['ads_delete_flash_error_notice'] = 'You must select an Ad fist';
$l['ads_delete_flash_error'] = 'error';

$l['ads_delete_header_alert'] = 'Delete Alert';
$l['ads_delete_message'] = 'Are you sure you want to delete the message with ID:';

$l['ads_delete_button_delete'] = 'Delete';
$l['ads_delete_button_cancel'] = 'Cancel';


// do_delete ad options

$l['ads_do_delete_breadcrumb'] ='Ad Randomizer system';
$l['ads_do_delete_header'] ='Ad Randomizer Management system';

$l['ads_do_delete_flash_success_title'] = 'Ad with ID:';
$l['ads_do_delete_flash_success_notice'] = ' deleted sucessfully.';
$l['ads_do_delete_flash_success'] = 'success';

$l['ads_do_delete_current_ads'] = 'Current Ads';
$l['ads_do_delete_add_id'] = 'Ad ID';
$l['ads_do_delete_ad'] = 'Ad';
$l['ads_do_delete_mode'] = 'Mode';
$l['ads_do_delete_number_views'] = 'Number of views';
$l['ads_do_delete_max_views'] = 'Max views';


$l['ads_mode_infinite'] = 'Infinite';
$l['ads_mode_limited'] = 'Limited';
$l['ads_mode_disabled'] = 'Disabled';
$l['ads_mode_expired'] = 'Expired';
$l['ads_mode_error'] = 'Error!';

$l['ads_button_add'] = 'Add';
$l['ads_button_edit'] = 'Edit';
$l['ads_button_disable_enable'] = 'Disable/Enable';
$l['ads_button_reset_view'] = 'Reset View';
$l['ads_button_delete'] = 'Delete';

// plugin form add

$l['ads_image_path_full'] = 'http://your-full-image-path-here';

$l['ads_add_advertisement'] = 'Add Advertisment';
$l['ads_add_advertisement_message'] = 'Maximum number of views before ad is deleted (0 for infinite)<br />';

$l['ads_add_advertisement_add_button'] = 'Add';
$l['ads_add_advertisement_reset_button'] = 'Reset';

// plugin form edit

$l['ads_edit_advertisement'] = 'Edit Advertisment';
$l['ads_edit_advertisement_message'] = 'Maximum number of views before ad is deleted (0 for infinite)<br />';

$l['ads_edit_advertisement_edit_button'] = 'Edit';
$l['ads_edit_advertisement_reset_button'] = 'Reset';

?>
