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

// Make sure we can't access this file directly from the browser.

if (!defined('IN_MYBB'))
{
	die('This file cannot be accessed directly.');
}

// add hooks

$plugins->add_hook("global_start", "ads_globals");
$plugins->add_hook("admin_config_menu", "ads_nav");
$plugins->add_hook("admin_config_action_handler", "ads_actionhandler");
$plugins->add_hook("admin_load", "ads_admin");

// plugin information

function ads_info()
{
    global $lang;

    $lang->load("ads");

    $lang->ads_PDesc = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="float:right;">' .
        '<input type="hidden" name="cmd" value="_s-xclick">' .
        '<input type="hidden" name="hosted_button_id" value="AZE6ZNZPBPVUL">' .
        '<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' .
        '<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">' .
        '</form>' . $lang->ads_PDesc;

    return Array(
        'name' => $lang->ads_PName,
        'description' => $lang->ads_PDesc,
        'website' => $lang->ads_PWeb,
        'author' => $lang->ads_PAuth,
        'authorsite' => $lang->ads_PAuthSite,
        'version' => $lang->ads_PVer,
        'compatibility' => $lang->ads_PCompat
    );
}

// plugin installation

function ads_install()
{
	global $db;

	$db->query("CREATE TABLE `" . TABLE_PREFIX . "ads` (`aid` int(11) NOT NULL auto_increment,`code` text NOT NULL,`mode` int(11) NOT NULL default '0',`shown` int(11) NOT NULL default '0',`max` int(11) NOT NULL default '0',PRIMARY KEY  (`aid`)) ;");
}

// is plugin installed

function ads_is_installed()
{
	global $db;

	if ($db->table_exists("ads"))
	{
		return true;
	}

	return false;
}

// activate plugin

function ads_activate()
{
	require MYBB_ROOT . '/inc/adminfunctions_templates.php';

	find_replace_templatesets("footer", '#' . preg_quote('{$auto_dst_detection}') . '#', '<br /><center>{$banner}</center><br />{$auto_dst_detection}');
}

// deactivate plugin

function ads_deactivate()
{
	require MYBB_ROOT . '/inc/adminfunctions_templates.php';

	find_replace_templatesets("footer", '#' . preg_quote('<br /><center>{$banner}</center><br />{$auto_dst_detection}') . '#', '{$auto_dst_detection}', 0);
}

// uninstall plugin

function ads_uninstall()
{
	global $db;

	$db->drop_table("ads");
}

// plugin globals

function ads_globals()
{
	global $db, $templates, $footer, $banner, $config;

	$blah = "0";
	$x = 0;

	$count = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE `mode` != 4 AND `mode` != 3");
	$count2 = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads");
	$num = Array();

	While ($row = $db->fetch_array($count, 'MYSQL_BOTH'))
	{ // 'FETCH_BOTH'
		$num[] = $row;
	}

	$ran = rand(0, count($num) - 1);
	$random = $db->fetch_field($count, "aid", $ran);

	if ($db->num_rows($count2) == "0")
	{
		$blah = "1";
		$empty = true;
	}

	$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid='" . $random . "'");

	$ads['aid'] = $db->fetch_field($query, "aid", $i);
	$ads['code'] = $db->fetch_field($query, "code", $i);
	$ads['mode'] = $db->fetch_field($query, "mode", $i);
	$ads['shown'] = $db->fetch_field($query, "shown", $i);
	$ads['max'] = $db->fetch_field($query, "max", $i);

	if ($ads['aid'] == $ran and $ads['mode'] != "3" and $ads['mode'] != "4")
	{
		$blah = "1";
	}

	// echo "3: ".$blah."<br />";
	//		$x = $x + 1;
	//	}
	// echo "4: ".$blah."<br />";

	if ($ads['mode'] == 2)
	{
		$new = $ads['shown'] + 1;

		if ($new < $ads['max'])
		{
			$db->query("UPDATE " . TABLE_PREFIX . "ads SET shown='" . $new . "' WHERE aid='" . $ads['aid'] . "'");
		}
		else
		{
			$db->query("UPDATE " . TABLE_PREFIX . "ads SET mode='4' WHERE aid='" . $ads['aid'] . "'");
		}
	}

	else
	if ($ads['mode'] == 1)
	{
		$new = $ads['shown'] + 1;

		$db->query("UPDATE " . TABLE_PREFIX . "ads SET shown='" . $new . "' WHERE aid='" . $ads['aid'] . "'");
	}

	$banner = $ads['code'];
}

// plugin acp sub menu

function ads_nav(&$sub_menu)
{
	global $mybb, $lang;

    $lang->load("ads");

    //if($mybb->usergroup['cancp']) // uncomment for all admin
    //comment for all admin //if (is_super_admin((int)$mybb->user['uid']))
    
	if (is_super_admin((int)$mybb->user['uid']))
	{
		$sub_menu['310'] = array(
			"id" => "ads",
			"title" => $lang->ads_submenu_title,
			"link" => "index.php?module=config/ads"
		);
	}
}

// plugin action handler

function ads_actionhandler(&$actions)
{
	global $mybb, $lang;

    $lang->load("ads"); // need to localize
    
    //if($mybb->usergroup['cancp']) // uncomment for all admin
    //comment for all admin //if (is_super_admin((int)$mybb->user['uid']))

	if (is_super_admin((int)$mybb->user['uid']))
	{
		$actions['ads'] = array(
			'active' => 'ads',
			'file' => ''
		);
	}
}

// plugin administration

function ads_admin()
{
	global $mybb, $db, $page, $lang;

    $lang->load("ads");

	require_once ("../inc/functions_time.php");

	if ($page->active_action != "ads")
	{
		return;
	}

	if ($mybb->input['add'])
	{
		$page->add_breadcrumb_item("{$lang->ads_add_breadcrumb}"); // need to localize
		$page->output_header("{$lang->ads_add_header}"); // need to localize
		
		ads_add_form();

		$page->output_footer();

		exit;
	}

	elseif ($mybb->input['do_add'])
	{
		$page->add_breadcrumb_item("{$lang->ads_do_add_breadcrumb}"); // need to localize
		$page->output_header("{$lang->ads_do_add_header}"); // need to localize

		if (!$mybb->input['code'])
		{
			flash_message("{$lang->ads_do_add_flash_error_notice}", '{$lang->ads_do_add_flash_error}'); // need to localize

			ads_add_form();
		}

		else
		{
			if ($mybb->input['max'] == "" || $mybb->input['max'] == "0")
			{
				$mode = 1;
			}

			else
			{
				$mode = 2;
			}
			
            if($mybb->input['max'] == '')
            {
                $mybb->input['max'] = htmlspecialchars_uni('0');	
            }

			$stuff = Array(
				"code" => $db->escape_string($mybb->input['code']) ,
				"max" => $mybb->input['max'],
				"mode" => $mode
			);

			$db->insert_query("ads", $stuff);

			flash_message("{$lang->ads_do_add_flash_success_notice}", '{$lang->ads_do_add_flash_success}'); // need to localize
			admin_redirect("index.php?module=config/ads");
		}

		$page->output_footer();

		exit;
	}

	elseif ($mybb->input['edit'])
	{
		$page->add_breadcrumb_item("{$lang->ads_edit_breadcrumb}"); // need to localize
		$page->output_header("{$lang->ads_edit_header}"); // need to localize

		if (!$mybb->input['aid'])
		{
			flash_message("{$lang->ads_edit_flash_error_notice}", '{$lang->ads_edit_flash_error}'); // need to localize
			admin_redirect("index.php?module=config/ads");
		}

		else
		{
			ads_edit_form();
		}

		$page->output_footer();

		exit;
	}

	elseif ($mybb->input['do_edit'])
	{
		$page->add_breadcrumb_item("{$lang->ads_do_edit_breadcrumb}"); // need to localize
		$page->output_header('{$lang->ads_do_edit_header}'); // need to localize

		if (!$mybb->input['code'])
		{
			flash_message("{$lang->ads_edit_flash_code_error_notice}", '{$lang->ads_edit_flash_code_error}'); // need to localize
			ads_edit_form();
		}

		else
		{
			if ($mybb->input['max'] == "" || $mybb->input['max'] == "0")
			{
				$mode = 1;
			}
			else
			{
				$mode = 2;
			}
			
            if($mybb->input['max'] == '')
            {
                $mybb->input['max'] = htmlspecialchars_uni('0');	
            }

			$stuff = Array(
				"code" => $db->escape_string($mybb->input['code']) ,
				"max" => $mybb->input['max'],
				"mode" => $mode
			);

			$db->update_query("ads", $stuff, "aid = '" . $mybb->input['aid'] . "'");

			$mybb->input['max'] == "0";

			flash_message("{$lang->ads_do_edit_flash_success_title}" . $mybb->input['aid'] . " {$lang->ads_do_edit_flash_success_notice}", '{$lang->ads_do_edit_flash_success}'); // need to localize
			admin_redirect("index.php?module=config/ads");
		}

		$page->output_footer();

		exit;
	}

	elseif ($mybb->input['reset'])
	{
		if (!$mybb->input['aid'])
		{
			flash_message("{$lang->ads_reset_flash_error_notice}", '{$lang->ads_reset_flash_error}'); // need to localize
			admin_redirect("index.php?module=config/ads");
		}

		else
		{
			$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid = '" . $mybb->input['aid'] . "'");

			$message = $db->fetch_array($query);

			$page->add_breadcrumb_item("{$lang->ads_reset_breadcrumb}"); // need to localize
			$page->output_header("{$lang->ads_reset_header}"); // need to localize

			$form = new Form("index.php?module=config/ads", "post");
			
			$table = new Table;

             // need to localize

			$table->construct_header("{$lang->ads_reset_header}", array(
				'class' => 'align_center',
				'colspan' => 1
			));

             // need to localize

			$table->construct_cell("{$lang->ads_reset_message}" . $message['aid'], array(
				'class' => 'align_center'
			));

			$table->construct_row();

             // need to localize

			$table->construct_cell($form->generate_hidden_field('aid', $message['aid']) . $form->generate_submit_button("{$lang->ads_reset_button_reset}", array(
				'name' => 'do_reset'
			)) . " " . $form->generate_submit_button("{$lang->ads_reset_button_cancel}", array(
				'name' => 'cancel'
			)) , array(
				'class' => 'align_center'
			));

			$table->construct_row();

             // need to localize

			$table->output("<center>".$lang->ads_table_output_reset."</center>");

			$form->end();

			$page->output_footer();

			exit;
		}
	}

	elseif ($mybb->input['do_reset'])
	{
		$db->update_query("ads", Array(
			"shown" => "0",
			"mode" => "2"
		) , "aid = '" . $mybb->input['aid'] . "'");

		flash_message("{$lang->ads_do_reset_flash_reset_success_title}" . $mybb->input['aid'] . "{$lang->ads_do_reset_flash_reset_success_notice}", '{$lang->ads_do_reset_flash_reset_success}'); // need to localize

		admin_redirect("index.php?module=config/ads");
	}

	elseif ($mybb->input['disable'])
	{
		if ($mybb->input['aid'] == "")
		{
			flash_message("{$lang->ads_do_reset_flash_disable_success_title}" . $mybb->input['aid'] . "{$lang->ads_do_reset_flash_disable_success_notice}", '{$lang->ads_do_reset_flash_disable_success}'); // need to localize

			admin_redirect("index.php?module=config/ads");
		}

		else
		{
			$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid = '" . $mybb->input['aid'] . "'");

			$message = $db->fetch_array($query);

			if ($message['mode'] == "3")
			{
				if ($message['max'] == "0")
				{
					$new_mode = "1";
				}

				else
				{
					$new_mode = "2";
				}

				$db->update_query("ads", Array(
					"mode" => $new_mode
				) , "aid = '" . $mybb->input['aid'] . "'");

				flash_message("{$lang->ads_do_reset_flash_mode_enable_success_title}" . $mybb->input['aid'] . "{$lang->ads_do_reset_flash_mode_enable_success_notice}", '{$lang->ads_do_reset_flash_mode_enable_success}'); // need to localize

				admin_redirect("index.php?module=config/ads");
			}

			else
			{
				$db->update_query("ads", Array(
					"mode" => "3"
				) , "aid = '" . $mybb->input['aid'] . "'");

				flash_message("{$lang->ads_do_reset_flash_mode_disable_success_title}" . $mybb->input['aid'] . "{$lang->ads_do_reset_flash_mode_disable_success_notice}", '{$lang->ads_do_reset_flash_mode_disable_success}'); // need to localize

				admin_redirect("index.php?module=config/ads");
			}
		}
	}

	elseif ($mybb->input['delete'])
	{
		if (!$mybb->input['aid'])
		{
			flash_message("{$land->ads_delete_flash_error_notice}", '{$land->ads_delete_flash_error}'); // need to localize

			admin_redirect("index.php?module=config/ads");
		}

		else
		{
			$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid = '" . $mybb->input['aid'] . "'");

			$message = $db->fetch_array($query);

			$page->add_breadcrumb_item("{$lang->ads_delete_breadcrumb}"); // need to localize
			$page->output_header("{$lang->ads_delete_header}"); // need to localize

			$form = new Form("index.php?module=config/ads", "post");

			$table = new Table;
            
            // need to localize

			$table->construct_header("{$lang->ads_delete_header_alert}", array(
				'class' => 'align_center',
				'colspan' => 1
			));

            // need to localize

			$table->construct_cell("{$lang->ads_delete_message}" . $message['aid'], array(
				'class' => 'align_center'
			));

			$table->construct_row();

            // need to localize

			$table->construct_cell($form->generate_hidden_field('aid', $message['aid']) . $form->generate_submit_button("{$lang->ads_delete_button_delete}", array(
				'name' => 'do_delete'
			)) . " " . $form->generate_submit_button("{$lang->ads_delete_button_cancel}", array(
				'name' => 'cancel'
			)) , array(
				'class' => 'align_center'
			));

			$table->construct_row();

            // need to localize

			$table->output("<center>".$lang->ads_table_output_delete."</center>");

			$form->end();

			$page->output_footer();

			exit;
		}
	}

	elseif ($mybb->input['do_delete'])
	{
		$db->delete_query("ads", "aid = '" . $mybb->input['aid'] . "'");

		flash_message("{$lang->ads_do_delete_flash_success_title}" . $mybb->input['aid'] . "{$lang->ads_do_delete_flash_success_notice}", '{$lang->ads_do_delete_flash_success}'); // need to localize

		admin_redirect("index.php?module=config/ads");
	}

	else
	{
		$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads");

		$sql = Array();

		While ($row = $db->fetch_array($query))
		{
			$sql[] = $row;
		}

		$ads = $sql;

		$page->add_breadcrumb_item("{$lang->ads_do_delete_breadcrumb}"); // need to localize

		$page->output_header("{$lang->ads_do_delete_header}"); // need to localize

		$table = new Table;

        // need to localize

		$table->construct_header("{$lang->ads_do_delete_current_ads}", array(
			'class' => 'align_center',
			'colspan' => 6
		));

		$form = new Form("index.php?module=config/ads", "post");
        
        // need to localize

		$table->construct_cell("{$lang->ads_do_delete_add_id}", array(
			'class' => 'align_center',
			'width' => '65'
		));

        // need to localize

		$table->construct_cell("{$lang->ads_do_delete_ad}", array(
			'class' => 'align_center'
		));

        // need to localize 

		$table->construct_cell("{$lang->ads_do_delete_mode}", array(
			'class' => 'align_center',
			'width' => '100'
		));

        // need to localize

		$table->construct_cell("{$lang->ads_do_delete_number_views}", array(
			'class' => 'align_center',
			'width' => '150'
		));

        // need to localize

		$table->construct_cell("{$lang->ads_do_delete_max_views}", array(
			'class' => 'align_center',
			'width' => '150'
		));

		$table->construct_row();

        // need to localize

		for ($i = 0; $i <= count($ads) - 1; $i++)
		{
			switch ($ads[$i]['mode'])
			{
			Case "1":
				$mode = "{$lang->ads_mode_infinite}";
				$bgcolour = "";
				break;

			Case "2":
				$mode = "{$lang->ads_mode_limited}";
				$bgcolour = "";
				break;

			Case "3":
				$mode = "{$lang->ads_mode_disabled}";
				$bgcolour = "background-color: #CCCCFF;";
				break;

			Case "4":
				$mode = "{$lang->ads_mode_expired}";
				$bgcolour = "background-color: #FFCCCC;";
				break;

			Default:
				$mode = "{$lang->ads_mode_error}";
				$bgcolour = "background-color: #FF0000;";
			}

			if ($ads[$i]['mode'] == "1")
			{
				$max = "&infin;";
			}
			
			else
			{
				$max = $ads[$i]['max'];
			}

			$table->construct_cell($form->generate_radio_button("aid", $ads[$i]['aid'], $ads[$i]['aid']) , array(
				'class' => 'align_center',
				'style' => $bgcolour,
				'width' => '75'
			));

			$table->construct_cell($ads[$i]['code'], array(
				'class' => 'align_center',
				'style' => $bgcolour
			));

			$table->construct_cell($mode, array(
				'class' => 'align_center',
				'style' => $bgcolour
			));

			$table->construct_cell($ads[$i]['shown'], array(
				'class' => 'align_center',
				'style' => $bgcolour
			));

			$table->construct_cell($max, array(
				'class' => 'align_center',
				'style' => $bgcolour
			));

			$table->construct_row();
		}

        // need to localize

		$table->construct_cell($form->generate_submit_button("{$lang->ads_button_add}", array(
			'name' => 'add'
		)) . " " . $form->generate_submit_button("{$lang->ads_button_edit}", array(
			'name' => 'edit'
		)) . " " . $form->generate_submit_button("{$lang->ads_button_disable_enable}", array(
			'name' => 'disable'
		)) . " " . $form->generate_submit_button("{$lang->ads_button_reset_view}", array(
			'name' => 'reset'
		)) . " " . $form->generate_submit_button("{$lang->ads_button_delete}", array(
			'name' => 'delete'
		)) , array(
			'colspan' => '6',
			'class' => 'align_center'
		));

		$table->construct_row();

		$table->output("<center>".$lang->ads_table_output."</center>"); // need to localize

		$form->end();

		$page->output_footer();

		exit;
	}
}

// plugin form add

function ads_Add_form($message_text = "")
{
	global $db, $mybb, $page, $lang;

    $lang->load("ads");

	$form = new Form("index.php?module=config/ads", "post");

	$message_text = '<img src="'.$lang->ads_image_path_full.'">'; // need to localize

	$table = new Table;

    // need to localize

	$table->construct_header("{$lang->ads_add_advertisement}", array(
		'class' => 'align_center',
		'colspan' => 1
	));

	$table->construct_cell($form->generate_text_area("code", $message_text) , array(
		'class' => 'align_center'
	));

	$table->construct_row();

    // need to localize

	$table->construct_cell("{$lang->ads_add_advertisement_message}" . $form->generate_text_box("max", "0") , array(
		'class' => 'align_center'
	));

	$table->construct_row();

    // need to localize

	$table->construct_cell($form->generate_submit_button("{$lang->ads_add_advertisement_add_button}", array(
		'name' => 'do_add'
	)) . " " . $form->generate_reset_button("{$lang->ads_add_advertisement_reset_button}", array(
		'name' => 'reset'
	)) , array(
		'class' => 'align_center'
	));

	$table->construct_row();

	$table->output("<center>".$lang->ads_table_output_add."</center>"); // need to localize

	$form->end();
}

// plugin form edit

function ads_edit_form()
{
	global $db, $mybb, $page, $lang;

    $lang->load("ads");

	$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid = '" . $mybb->input['aid'] . "'");

	$message = $db->fetch_array($query);

	$form = new Form("index.php?module=config/ads", "post");

	$table = new Table;

    // need to localize

	$table->construct_header("{$lang->ads_edit_advertisement}", array(
		'class' => 'align_center',
		'colspan' => 1
	));

	$table->construct_cell($form->generate_text_area("code", $message['code']) , array(
		'class' => 'align_center'
	));

	$table->construct_row();

    // need to localize

	$table->construct_cell("{$lang->ads_edit_advertisement_message}" . $form->generate_text_box("max", $message['max']) , array(
		'class' => 'align_center'
	));

	$table->construct_row();

    // need to localize

	$table->construct_cell($form->generate_hidden_field('aid', $message['aid']) . $form->generate_submit_button("{$lang->ads_edit_advertisement_edit_button}", array(
		'name' => 'do_edit'
	)) . " " . $form->generate_reset_button("{$lang->ads_edit_advertisement_reset_button}", array(
		'name' => 'reset'
	)) , array(
		'class' => 'align_center'
	));

	$table->construct_row();

	$table->output("<center>".$lang->ads_table_output_edit."</center>"); // need to localize

	$form->end();
}

?>
