<?php
// $Id: template.php,v 1.17 2008/09/11 10:52:53 johnalbin Exp $

/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to jiiwiz_one_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: jiiwiz_one_breadcrumb()
 *
 *   where jiiwiz_one is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions, please visit the Theme
 *   Developer's Guide on Drupal.org: http://drupal.org/node/223430
 *   For more information on template suggestions, please visit the Theme
 *   Developer's Guide on Drupal.org: http://drupal.org/node/223440 and
 *   http://drupal.org/node/190815#template-suggestions
 */


/*
 * Add any conditional stylesheets you will need for this sub-theme.
 *
 * To add stylesheets that ALWAYS need to be included, you should add them to
 * your .info file instead. Only use this section if you are including
 * stylesheets based on certain conditions.
 */
/* -- Delete this line if you want to use and modify this code
// Example: optionally add a fixed width CSS file.
if (theme_get_setting('jiiwiz_one_fixed')) {
  drupal_add_css(path_to_theme() . '/layout-fixed.css', 'theme', 'all');
}
// */


/**
 * Implementation of HOOK_theme().
 */
//function jiiwiz_one_theme(&$existing, $type, $theme, $path) {
//  $hooks = zen_theme($existing, $type, $theme, $path);
//  // Add your theme hooks like this:
//  /*
//  $hooks['hook_name_here'] = array( // Details go here );
//  */
//  // @TODO: Needs detailed comments. Patches welcome!
//  return $hooks;
//}



// the following has been deprecated in d6 and no longer gets called.
//function _phptemplate_variables($hook, $vars)
//{
//	watchdog('demo', '_phptemplate_var time');
//	switch($hook) {
//		case 'page':
//			if ((arg(0) == 'admin')) {
//				$vars['template_file'] = 'page-booey';
//			}
//			break;
//	}
//	return $vars;
//}


/**
function jiiwiz_one_restaurant_review_list_item($rr_info)
{
	watchdog('restaurant_review', "is this called?");
	return $rr_info->address;
}
*/

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
//function jiiwiz_one_preprocess(&$vars, $hook) {
//	watchdog('demo', 'jiiwiz preprocess');
//  //$vars['sample_variable'] = t('Lorem ipsum.');
//}

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
//function jiiwiz_one_preprocess_page(&$vars, $hook) {
//	watchdog('demo', 'jiiwiz preprocess page');
//	// override the template file with:
//	//$vars['template_files'][] = 'page-bill';
//}

//function phptemplate_preprocess_page(&$vars, $hook)
//{
//	watchdog('booye', 'phpt pre');
//}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
//function jiiwiz_one_preprocess_node(&$vars, $hook) {
//	watchdog('demo', 'jiiwiz preprocess node');
//  //$vars['sample_variable'] = t('Lorem ipsum.');
//}

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
//function jiiwiz_one_preprocess_comment(&$vars, $hook) {
//	watchdog('demo', 'jiiwiz preprocess comment');
//  //$vars['sample_variable'] = t('Lorem ipsum.');
//}

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
//function jiiwiz_one_preprocess_block(&$vars, $hook) {
//	watchdog('demo', 'jiiwiz preprocess block');
//  //$vars['sample_variable'] = t('Lorem ipsum.');
//}

function Kosmos_preprocess_page(&$vars, $hook) {
    if ( arg(0) == 'user' && arg(1) == 'register' ) {
        jquery_ui_add('ui.dialog'); 
    }
    //global $user;
    //$curr_uri = check_plain(request_uri());
    //log_debug('curr uri: ', $curr_uri);
    //include_once(drupal_get_path('module', 'safacebook') . '/facebook-platform/php/facebook.php');
    //$api_key = variable_get('safacebook_api_key', '');
    //$secret = variable_get('safacebook_secret', '');
    //log_debug('api key is ', $api_key);
    //log_debug('secret is ', $secret);
    //$fb=new Facebook($api_key,$secret);
    //log_debug("got a facebook object: ", $fb);
    //$fb_user=$fb->get_loggedin_user();
    //log_debug("fb_user is ", $fb_user);

    // if the user is logged into facebook, log them into the site if they aren't already.
    // don't log the user in if it's the logout link...
    // if the user is NOT logged into facebook but is still logged in, log them out
    //if ( user_is_logged_in() ) {
    //    log_debug("User is logged in... user obj is ", $user);
    //    if (!$fb_user) {
    //        log_debug("no FB user, logging out...");
    //        drupal_goto('logout');  // reload current page to correctly show User Welcome block
    //    }
    //}
    //else {
    //    log_debug("user is not logged in...");
    //    if ($fb_user) {
    //        log_debug("trying to log in user...");
            //safacebook_login_user($fb_user);  // in safacebook module
    //    }
    //}
}

function Kosmos_preprocess_search_block_form(&$vars, $hook) {

  // Modify elements of the search form
//  $vars['form']['search_block_form']['#title'] = t('');
//  
  // Set a default value for the search box
  $vars['form']['search_block_form']['#value'] = t('Search');
  
  // Add a custom class to the search box
  $vars['form']['search_block_form']['#attributes'] = array('class' => 'NormalTextBox txtSearch', 
  'onfocus' => "if (this.value == 'Search') {this.value = '';}",
  'onblur' => "if (this.value == '') {this.value = 'Search';}");
  
  // Change the text on the submit button
  //$vars['form']['submit']['#value'] = t('Go');
  //$vars['form']['type[profile]']['#attributes'] = array('type' => 'hidden', 'value' => 'profile');
  $vars['form']['type[profile]']['#attributes'] = array('type' => 'hidden', 'value' => 'profile');

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_block_form']['#printed']);
  $vars['search']['search_block_form'] = drupal_render($vars['form']['search_block_form']);

  $vars['form']['submit']['#type'] = 'image_button';
  $vars['form']['submit']['#src'] = path_to_theme() . '/images/search-box-right.gif';

  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);
  
  $vars['search']['content_type'] = drupal_render($vars['form']['type[profile]']);
  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
  //log_debug('search form: ', $vars['search_form']);
  
}



function Kosmos_menu_item_link($link) {
    // remove the "login" and "request password" tabs - will just confuse the user...
    //log_debug("menu item link: ", $link['link_path']);
    //log_debug("menu item link: ", $link);
    if ( ($link['path'] == "user/password") || ($link['path'] == "user/login") ) {
        return '';
    }
    
    if (empty($link['localized_options'])) {
      $link['localized_options'] = array();
    }

    return l($link['title'], $link['href'], $link['localized_options']);
}


function Kosmos_preprocess_block(&$vars, $hook) {
  //log_debug('preprocess block...');
  //log_debug('hook is ', $hook);
  //log_debug('vars: ', $vars);
}


// override the display of the deadline for a job posting and add a summary description to the listing
function Kosmos_preprocess_job_posting_node_display(&$vars) {
    //log_debug('job posting...');
    //log_debug('deadline: ', $vars['node']->job_posting_deadline);
    if ( $vars['node']->job_posting_expires != 0) {
        $vars['deadline'] = format_date($vars['node']->job_posting_deadline, 'custom', 'D, M j, Y');
    }
    else {
        $vars['deadline'] = NULL;
    }
    $vars['template_file'] = '/sites/all/themes/SpontaneousAcademia/job-posting-node';
    //$vars['template_file'] = 'job-posting-node';
    //$vars['template_files'][] = 'job-posting-node';
    //log_debug('template: ', $vars['template']);
    //log_debug('vars: ', $vars);
}


// add the user's main role name to the template
function Kosmos_preprocess_user_profile(&$vars) {
    //log_debug('preprocess user profile');
    //log_debug('vars is ', $vars);
    //log_debug('The user object is ', $vars['user']);
    $vars['main_role'] = '';
    foreach ($vars['account']->roles as $role) {
        if (!($role == 'authenticated user')) {
            // get the first role that is NOT auth user
            $vars['main_role'] = $role;
        }
    }
}


function Kosmos_breadcrumb($breadcrumb) {
    if (!empty($breadcrumb)) {
        // add the current page title to the breadcrumb
        if (drupal_get_title()!='Home'){
            if ($breadcrumb[0]='Home') {
                unset($breadcrumb[0]);
                array_unshift($breadcrumb, array_shift($breadcrumb) );
                return '<div class="breadcrumb">'. implode(' &raquo; ', $breadcrumb) .'</div>';
            }else {
                return '<div class="breadcrumb">'. implode(' &raquo; ', $breadcrumb) .'</div>';
            }
        }
    }
}



function Kosmos_theme() {
  return array(
    'user_login' => array(
      'arguments' => array('form' => NULL),
      'template' => 'spontaneous-user-login',  // following convention, replace underscores with dashes
    )
  );
}