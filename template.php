<?php
// $Id: template.php,v 1.17 2008/09/11 10:52:53 johnalbin Exp $



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


function Kosmos_preprocess_node(&$vars, $hook) {
    //dpm($vars);
    //dd($vars);
    $vars['date'] = format_date($vars['created'], 'custom', 'n/j/Y');
    $vars['time'] = format_date($vars['created'], 'custom', 'g:ia');
  // Strip tags from teaser
  if ($vars['teaser']) {
    // $coreteaser is the teaser without extra cck fields
    $coreteaser = $vars['node']->content['body']['#value'];
    // Make sure there is content to strip tags from
    if ($coreteaser) {
      $teaser = $vars['content'];
      // Calculate position of $coreteaser in $teaser
      $start = strpos($teaser, $coreteaser);
      // Calculate length of core teaser with tags
      $length = strlen($coreteaser);
      // Strip tags from $coreteaser
      $replacement = strip_tags($coreteaser);
      // Replace corresponding part of $teaser with stripped $coreteaser
      $vars['content'] = substr_replace($teaser, $replacement, $start, $length);
    }
  }
}



function Kosmos_preprocess_search_block_form(&$vars, $hook) {

  // Modify elements of the search form
//  $vars['form']['search_block_form']['#title'] = t('');
//  
  // Set a default value for the search box
  $vars['form']['search_block_form']['#value'] = t('');
  
  // Add a custom class to the search box
  $vars['form']['search_block_form']['#attributes'] = array('class' => 'NormalTextBox txtSearch', 'value' => 'Search',
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
  $vars['form']['submit']['#src'] = path_to_theme() . '/images/search-box-right.jpg';

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
    $vars['template_file'] = '/sites/all/themes/Kosmos/job-posting-node';
    //$vars['template_file'] = 'job-posting-node';
    //$vars['template_files'][] = 'job-posting-node';
    //log_debug('template: ', $vars['template']);
    //log_debug('vars: ', $vars);
}


// add the user's main role name to the template
function Kosmos_preprocess_user_profile(&$vars) {
    //log_debug('preprocess user profile');
    //dd($vars);
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


function Kosmos_panels_pane($content, $pane, $display) {
    dd('panels pane');
    //dd($content);
  if (!empty($content->content)) {
    $idstr = $classstr = '';
    if (!empty($content->css_id)) {
      $idstr = ' id="' . $content->css_id . '"';
    }
    if (!empty($content->css_class)) {
      $classstr = ' ' . $content->css_class;
    }

    $output = "<div class=\"panel-pane$classstr\"$idstr>\n";
    if (user_access('view pane admin links') && !empty($content->admin_links)) {
      $output .= "<div class=\"admin-links panel-hide\">" . theme('links', $content->admin_links) . "</div>\n";
    }
    if (!empty($content->title)) {
        if ($content->title == "Comments" ) {
            $output .= "<h3>What do you think?</h3>";
        }
        elseif ($content->title == "Related Posts:") {
            $output .= '<h3>You may also like...</h3>';
        }
        elseif ($content->title == "Featured posts from the community" ) {
            $output .= '<h3>The Buzz...</h3>';
        }
      $output .= "<h2 class=\"pane-title\">$content->title</h2>\n";
    }

    if (!empty($content->feeds)) {
      $output .= "<div class=\"feed\">" . implode(' ', $content->feeds) . "</div>\n";
    }

    $output .= "<div class=\"pane-content\">$content->content</div>\n";

    if (!empty($content->links)) {
      $output .= "<div class=\"links\">" . theme('links', $content->links) . "</div>\n";
    }


    if (!empty($content->more)) {
      if (empty($content->more['title'])) {
        $content->more['title'] = t('more');
      }
      $output .= "<div class=\"more-link\">" . l($content->more['title'], $content->more['href']) . "</div>\n";
    }

    $output .= "</div>\n";
    return $output;
  }
}


/* custom implementation of the 'more like this' block */
function Kosmos_apachesolr_mlt_recommendation_block($docs) {
  $links = array();
  dd($docs);
  $count = 0;
  foreach ($docs as $result) {
    $count++;
    if ($count>3) { break; }
    // Suitable for single-site mode.
    dd($result->nid);
    $mlt_node = node_load($result->nid);
    dd($mlt_node);
    $date = format_date($mlt_node->created, 'custom', 'n/j/Y');
    $time = format_date($mlt_node->created, 'custom', 'g:ia');
    $categories = $mlt_node->taxonomy;
    $tax = '';
    if ($categories) {
        $tax = '<br>Posted in ';
        foreach ($categories as $category) {
            $tax .= $category->name . ', ';
        }
        $tax = rtrim($tax, ',');
    }
    
    $links[] = l($result->title, $result->path, array('html' => TRUE)) . $tax;
  }
  return theme('item_list', $links);
}


function Kosmos_theme() {
  return array(
    'user_login' => array(
      'arguments' => array('form' => NULL),
      'template' => 'spontaneous-user-login',  // following convention, replace underscores with dashes
    )
  );
}