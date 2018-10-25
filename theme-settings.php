<?php

/**
 * @file
 * Theme settings file for the arcatach theme.
 */

require_once dirname(__FILE__) . '/template.php';

/**
 * Implements hook_form_FORM_alter().
 */

function arcatach_form_system_theme_settings_alter(&$form, $form_state) {
	$form['alpha_settings']['layout']['responsive_settings']['custom_mobile_mq'] = array(
		'#title' => 'Mobile media query',
		'#description' => 'When none of the layouts below fire, this should so js can know we are not in one of the below layouts',
		'#type' => 'textfield',
		'#max_length' => 255,
		'#size' => 140,
		'#default_value' => theme_get_setting('custom_mobile_mq'),
	);
}

