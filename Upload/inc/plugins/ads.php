<?php
/***********************************************

Ad Randomizer system

Created by Nitemare
http://www.nitemare.ca

Releace date: 16th September 2007

edited by: vintagedaddyo
http://community.mybb.com/user-6029.html

last edited: 6th March 2019

************************************************/

// Make sure we can't access this file directly from the browser.

if (!defined('IN_MYBB'))
{
	die('This file cannot be accessed directly.');
}

// ad hooks

$plugins->add_hook("global_start", "ads_globals");
$plugins->add_hook("admin_config_menu", "ads_nav");
$plugins->add_hook("admin_config_action_handler", "ads_actionhandler");
$plugins->add_hook("admin_load", "ads_admin");

// plugin information

function ads_info()
{
	return array(
		"name" => "Ad Randomizer system",
		"description" => "This Plugin will display an ad on the main page from a database",
		"website" => "http://community.mybb.com/user-6029.html",
		"author" => "Nitemare & updated by Vintagedaddyo",
		"authorsite" => "http://community.mybb.com/user-6029.html",
		"version" => "5.0.3",
		"guid" => "80d9be40af59e71edb421b93e820b10f",
		"compatibility" => "18*"
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
	global $mybb;
	if (is_super_admin((int)$mybb->user['uid']))
	{
		$sub_menu['310'] = array(
			"id" => "ads",
			"title" => "Ad Rotation Manager",
			"link" => "index.php?module=config/ads"
		);
	}
}

// plugin action handler

function ads_actionhandler(&$actions)
{
	global $mybb;
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
	require_once ("../inc/functions_time.php");

	if ($page->active_action != "ads")
	{
		return;
	}

	if ($mybb->input['add'])
	{
		$page->add_breadcrumb_item("Ad Randomizer system");
		$page->output_header("Ad Randomizer Management system");
		ads_add_form();
		$page->output_footer();
		exit;
	}
	elseif ($mybb->input['do_add'])
	{
		$page->add_breadcrumb_item("Ad Randomizer system");
		$page->output_header("Ad Randomizer Management system");
		if (!$mybb->input['code'])
		{
			flash_message("You must enter the code for the Ad", 'error');
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

			$stuff = Array(
				"code" => $db->escape_string($mybb->input['code']) ,
				"max" => $mybb->input['max'],
				"mode" => $mode
			);
			$db->insert_query("ads", $stuff);
			flash_message("Ad added sucessfully.", 'success');
			admin_redirect("index.php?module=config/ads");
		}

		$page->output_footer();
		exit;
	}
	elseif ($mybb->input['edit'])
	{
		$page->add_breadcrumb_item("Ad Randomizer system");
		$page->output_header("Ad Randomizer Management system");
		if (!$mybb->input['aid'])
		{
			flash_message("You must select an ad to edit first", 'error');
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
		$page->add_breadcrumb_item("Ad Randomizer system");
		$page->output_header("Ad Randomizer Management system");
		if (!$mybb->input['code'])
		{
			flash_message("You must enter the code for the Ad", 'error');
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

			$stuff = Array(
				"code" => $db->escape_string($mybb->input['code']) ,
				"max" => $mybb->input['max'],
				"mode" => $mode
			);
			$db->update_query("ads", $stuff, "aid = '" . $mybb->input['aid'] . "'");
			$mybb->input['max'] == "0";
			flash_message("Message with ID:" . $mybb->input['aid'] . " edited sucessfully.", 'success');
			admin_redirect("index.php?module=config/ads");
		}

		$page->output_footer();
		exit;
	}
	elseif ($mybb->input['reset'])
	{
		if (!$mybb->input['aid'])
		{
			flash_message("You mustselect an Ad fist", 'error');
			admin_redirect("index.php?module=config/ads");
		}
		else
		{
			$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid = '" . $mybb->input['aid'] . "'");
			$message = $db->fetch_array($query);
			$page->add_breadcrumb_item("Ad Randomizer system");
			$page->output_header("Ad Randomizer Management system");
			$form = new Form("index.php?module=config/ads", "post");
			$table = new Table;
			$table->construct_header("Reset Ad Veiws", array(
				'class' => 'align_center',
				'colspan' => 1
			));
			$table->construct_cell("Are you sure you want to the advertisment views with ID:" . $message['aid'], array(
				'class' => 'align_center'
			));
			$table->construct_row();
			$table->construct_cell($form->generate_hidden_field('aid', $message['aid']) . $form->generate_submit_button("Reset Views", array(
				'name' => 'do_reset'
			)) . " " . $form->generate_submit_button("Cancel", array(
				'name' => 'cancel'
			)) , array(
				'class' => 'align_center'
			));
			$table->construct_row();
			$table->output("<center>Ad Randomizer system</center>");
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
		flash_message("Ad views with ID:" . $mybb->input['aid'] . " reset sucessfully.", 'success');
		admin_redirect("index.php?module=config/ads");
	}
	elseif ($mybb->input['disable'])
	{
		if ($mybb->input['aid'] == "")
		{
			flash_message("Ad with ID:" . $mybb->input['aid'] . " disabled sucessfully.", 'success');
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
				flash_message("Ad with ID:" . $mybb->input['aid'] . " enabled sucessfully.", 'success');
				admin_redirect("index.php?module=config/ads");
			}
			else
			{
				$db->update_query("ads", Array(
					"mode" => "3"
				) , "aid = '" . $mybb->input['aid'] . "'");
				flash_message("Ad with ID:" . $mybb->input['aid'] . " disabled sucessfully.", 'success');
				admin_redirect("index.php?module=config/ads");
			}
		}
	}
	elseif ($mybb->input['delete'])
	{
		if (!$mybb->input['aid'])
		{
			flash_message("You mustselect an Ad fist", 'error');
			admin_redirect("index.php?module=config/ads");
		}
		else
		{
			$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid = '" . $mybb->input['aid'] . "'");
			$message = $db->fetch_array($query);
			$page->add_breadcrumb_item("Ad Randomizer system");
			$page->output_header("Ad Randomizer Management system");
			$form = new Form("index.php?module=config/ads", "post");
			$table = new Table;
			$table->construct_header("Delete Alert", array(
				'class' => 'align_center',
				'colspan' => 1
			));
			$table->construct_cell("Are you sure you want to delete the message with ID:" . $message['aid'], array(
				'class' => 'align_center'
			));
			$table->construct_row();
			$table->construct_cell($form->generate_hidden_field('aid', $message['aid']) . $form->generate_submit_button("Delete", array(
				'name' => 'do_delete'
			)) . " " . $form->generate_submit_button("Cancel", array(
				'name' => 'cancel'
			)) , array(
				'class' => 'align_center'
			));
			$table->construct_row();
			$table->output("<center>Ad Randomizer system</center>");
			$form->end();
			$page->output_footer();
			exit;
		}
	}
	elseif ($mybb->input['do_delete'])
	{
		$db->delete_query("ads", "aid = '" . $mybb->input['aid'] . "'");
		flash_message("Ad with ID:" . $mybb->input['aid'] . " deleted sucessfully.", 'success');
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
		$page->add_breadcrumb_item("Ad Randomizer system");
		$page->output_header("Ad Randomizer Management system");
		$table = new Table;
		$table->construct_header("Current Ads", array(
			'class' => 'align_center',
			'colspan' => 6
		));
		$form = new Form("index.php?module=config/ads", "post");
		$table->construct_cell("Ad ID", array(
			'class' => 'align_center',
			'width' => '65'
		));
		$table->construct_cell("Ad", array(
			'class' => 'align_center'
		));
		$table->construct_cell("Mode", array(
			'class' => 'align_center',
			'width' => '100'
		));
		$table->construct_cell("Number of views", array(
			'class' => 'align_center',
			'width' => '150'
		));
		$table->construct_cell("Max views", array(
			'class' => 'align_center',
			'width' => '150'
		));
		$table->construct_row();
		for ($i = 0; $i <= count($ads) - 1; $i++)
		{
			switch ($ads[$i]['mode'])
			{
			Case "1":
				$mode = "Infinite";
				$bgcolour = "";
				break;

			Case "2":
				$mode = "Limited";
				$bgcolour = "";
				break;

			Case "3":
				$mode = "Disabled";
				$bgcolour = "background-color: #CCCCFF;";
				break;

			Case "4":
				$mode = "Exipred";
				$bgcolour = "background-color: #FFCCCC;";
				break;

			Default:
				$mode = "Error!";
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

		$table->construct_cell($form->generate_submit_button("Add", array(
			'name' => 'add'
		)) . " " . $form->generate_submit_button("Edit", array(
			'name' => 'edit'
		)) . " " . $form->generate_submit_button("Disable/Enable", array(
			'name' => 'disable'
		)) . " " . $form->generate_submit_button("Reset View", array(
			'name' => 'reset'
		)) . " " . $form->generate_submit_button("Delete", array(
			'name' => 'delete'
		)) , array(
			'colspan' => '6',
			'class' => 'align_center'
		));
		$table->construct_row();
		$table->output("<center>Ad Randomizer system</center>");
		$form->end();
		$page->output_footer();
		exit;
	}
}

// plugin form add

function ads_Add_form($message_text = "")
{
	global $db, $mybb, $page;
	$form = new Form("index.php?module=config/ads", "post");
	$message_text = '<img src="your-image-path-here">';
	$table = new Table;
	$table->construct_header("Add Advertisment", array(
		'class' => 'align_center',
		'colspan' => 1
	));
	$table->construct_cell($form->generate_text_area("code", $message_text) , array(
		'class' => 'align_center'
	));
	$table->construct_row();
	$table->construct_cell("Maximum number of views before ad is deleted (0 for infinite)<br />" . $form->generate_text_box("max", "0") , array(
		'class' => 'align_center'
	));
	$table->construct_row();
	$table->construct_cell($form->generate_submit_button("Add", array(
		'name' => 'do_add'
	)) . " " . $form->generate_reset_button("Reset", array(
		'name' => 'reset'
	)) , array(
		'class' => 'align_center'
	));
	$table->construct_row();
	$table->output("<center>Ad Randomizer system</center>");
	$form->end();
}

// plugin form edit

function ads_edit_form()
{
	global $db, $mybb, $page;
	$query = $db->query("SELECT * FROM " . TABLE_PREFIX . "ads WHERE aid = '" . $mybb->input['aid'] . "'");
	$message = $db->fetch_array($query);
	$form = new Form("index.php?module=config/ads", "post");
	$table = new Table;
	$table->construct_header("Edit Advertisment", array(
		'class' => 'align_center',
		'colspan' => 1
	));
	$table->construct_cell($form->generate_text_area("code", $message['code']) , array(
		'class' => 'align_center'
	));
	$table->construct_row();
	$table->construct_cell("Maximum number of views before ad is deleted (0 for infinite)<br />" . $form->generate_text_box("max", $message['max']) , array(
		'class' => 'align_center'
	));
	$table->construct_row();
	$table->construct_cell($form->generate_hidden_field('aid', $message['aid']) . $form->generate_submit_button("Edit", array(
		'name' => 'do_edit'
	)) . " " . $form->generate_reset_button("Reset", array(
		'name' => 'reset'
	)) , array(
		'class' => 'align_center'
	));
	$table->construct_row();
	$table->output("<center>Ad Randomizer system</center>");
	$form->end();
}

?>
