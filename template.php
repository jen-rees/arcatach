<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * arcatach theme.
 */



/*  adding a class to the menu ul 

function omega_menu_tree($variables) {
  return '<ul class="menu nav navbar-nav">' . $variables['tree'] . '</ul>';

}

*/

function arcatach_form_alter(&$form, &$state, $id) {
	if($id === 'views_exposed_form' && $form['#id'] === 'views-exposed-form-member-directory-page') {
		$form['field_type_of_business_tid']['#type'] = 'multiselect';
		$form['field_type_of_business_tid']['#title'] = 'Type of Business';
		$p = drupal_get_path('module', 'multiselect') . '/multiselect.';
		$form['#attached']['css'][] = $p . 'css';
		$form['#attached']['js'][] = $p . 'js';
	}
	if($id === 'mailchimp_lists_user_subscribe_form_arcata_chamber_newsletter') {
		$form['submit']['#value'] = 'Signup';
		
		$form['mailchimp_lists_header']['#weight'] = -100;
		$form['mailchimp_lists']['mailchimp_arcata_chamber_newsletter']['title']['#markup'] = '';
		$mc = &$form['mailchimp_lists']['mailchimp_arcata_chamber_newsletter'];
		if(isset($mc['subscribe'])) {
			$mc['subscribe']['#default_value'] = TRUE;
			$mc['subscribe']['#attributes'] = array('style' => 'display:inline');
			unset($mc['subscribe']['title']);
		} else {
			$mc['mergevars']['EMAIL']['#attributes']['placeholder'] = 'Your email';
			$mc['mergevars']['EMAIL']['#size'] = 15;
		}
	}
}

