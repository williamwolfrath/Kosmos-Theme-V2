<?php
// $Id: page.tpl.php,v 1.11.2.1 2009/04/30 00:13:31 goba Exp $

/**
 * @file page.tpl.php
 *
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $css: An array of CSS files for the current page.
 * - $directory: The directory the theme is located in, e.g. themes/garland or
 *   themes/garland/minelli.
 * - $is_front: TRUE if the current page is the front page. Used to toggle the mission statement.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Page metadata:
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $head_title: A modified version of the page title, for use in the TITLE tag.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $body_classes: A set of CSS classes for the BODY tag. This contains flags
 *   indicating the current layout (multiple columns, single column), the current
 *   path, whether the user is logged in, and so on.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $mission: The text of the site mission, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $search_box: HTML to display the search box, empty if search has been disabled.
 * - $primary_links (array): An array containing primary navigation links for the
 *   site, if they have been configured.
 * - $secondary_links (array): An array containing secondary navigation links for
 *   the site, if they have been configured.
 *
 * Page content (in order of occurrance in the default page.tpl.php):
 * - $left: The HTML for the left sidebar.
 *
 * - $breadcrumb: The breadcrumb trail for the current page.
 * - $title: The page title, for use in the actual HTML content.
 * - $help: Dynamic help text, mostly for admin pages.
 * - $messages: HTML for status and error messages. Should be displayed prominently.
 * - $tabs: Tabs linking to any sub-pages beneath the current page (e.g., the view
 *   and edit tabs when displaying a node).
 *
 * - $content: The main content of the current Drupal page.
 *
 * - $right: The HTML for the right sidebar.
 *
 * Footer/closing data:
 * - $feed_icons: A string of all feed icons for the current page.
 * - $footer_message: The footer message as defined in the admin settings.
 * - $footer : The footer region.
 * - $closure: Final closing markup from any modules that have altered the page.
 *   This variable should always be output last, after all other dynamic content.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  
      <link rel="stylesheet" href="/sites/all/themes/Kosmos/css/blueprint/screen.css" type="text/css" media="screen, projection">
      <link rel="stylesheet" href="/sites/all/themes/Kosmos/css/blueprint/src/grid.css" type="text/css" media="screen, projection">
      <link rel="stylesheet" href="/sites/all/themes/Kosmos/css/blueprint/src/typography.css" type="text/css" media="screen, projection">
	<!--[if lt IE 8]><link rel="stylesheet" href="/sites/all/themes/Kosmos/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
      <?php print $styles; ?>
	<!--[if IE 6]>
	        <script type="text/javascript" src="/unitpngfix.js"></script>
	<![endif]-->
  <script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US" type="text/javascript"></script> <!-- make sure this loads before others that need it! -->
  <script type="text/javascript">
//FB.init("990f0319a7449a516ee2032d33478742", "xd_receiver.htm", {"reloadIfSessionStateChanged":true, "ifUserConnected":"front-loggedin", "ifUserNotConnected":"front-anonymous"});
//FB.init("990f0319a7449a516ee2032d33478742", "xd_receiver.htm", {"reloadIfSessionStateChanged":true});
//FB.init("990f0319a7449a516ee2032d33478742");
</script>
  <script src="/sites/all/themes/Kosmos/js/cufon.js" type="text/javascript"></script>
  <script src="/sites/all/themes/Kosmos/js/Myriad_Pro_400.font.js" type="text/javascript"></script>
  <script src="/sites/all/themes/Kosmos/js/Gill_Sans_MT_Pro_500.font.js" type="text/javascript"></script>
  <?php print $scripts; ?>
    <script type="text/javascript" src="http://www.trumba.com/scripts/spuds.js"></script>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
  <script type="text/javascript">
    Cufon.replace('h1', {fontFamily: 'Myriad Pro'});
    Cufon.replace('h2', {fontFamily: 'Myriad Pro'})
    Cufon.replace('h3.pane-title', {fontFamily: 'Myriad Pro'});
    Cufon.replace('.panel-col-first ul.menu li', {fontFamily: 'Gill Sans MT Pro'});
    Cufon.replace('a.welcome', {fontFamily: 'Gill Sans MT Pro'});
  </script>  
</head>


<body class="<?php print $body_classes; ?>">

<script type="text/javascript">
  //FB.init('9eeb90426ff3bfb949986d73aa82d2af', "/xd_receiver.htm", {"reloadIfSessionStateChanged":true});
  FB.init('<?php print variable_get("safacebook_api_key", ""); ?>', "/xd_receiver.htm");
</script>

 
  <div id="page">
    <div id="page-inner">
    <div id="header">
      <div id="header-inner">

	  <div id="logo-title">
	    <?php if (!empty($logo)): ?>
		<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
	    <?php endif; ?>
	  </div> <!-- /logo-title -->
	  <?php if (!empty($header)): ?>
		<?php print $header; ?>
	  <?php endif; ?>
	  <div id="header-text">
	      <span id="header-slogan"><img src="/sites/all/themes/Kosmos/images/header-slogan.jpg"/></span>
	      <span id="login-reg">
		<?php global $user; if (user_is_logged_in()): ?>
		      <a class="welcome" href="/user">Welcome Back, <?php print $user->name; ?></a>
		      <img src="/sites/all/themes/Kosmos/images/img-dot.jpg"/>
		      
		      <?php if ( $_SESSION['login_type']!='fb' ): ?>
			    <a id="reg-link" href="/logout"><img src="/sites/all/themes/Kosmos/images/logout-link.jpg"/></a>
		      <?php else: ?>
			    <a href="/logout" onclick="FB.Connect.logoutAndRedirect('/logout'); return false;"><img src="/sites/all/themes/Kosmos/images/logout-link.jpg"/></a>
		      <?php endif;?>
		
		<?php else: ?>
		      <a id="login-link" href="/user"><img src="/sites/all/themes/Kosmos/images/login-link.jpg"/></a>
		      <img src="/sites/all/themes/Kosmos/images/img-dot.jpg"/>
		      <a id="reg-link" href="/user"><img src="/sites/all/themes/Kosmos/images/reg-link.jpg"/></a>
		<?php endif; ?>
	      </span>
	  </div>

      </div>
    </div> <!-- /header -->

    <div id="container" class="clear-block container"><div id="container-inner">
      <div id="navigation" class="menu <?php if (!empty($primary_links)) { print "withprimary"; } if (!empty($secondary_links)) { print " withsecondary"; } ?> ">
	<?php print $navbar; ?>
        <!-- secondary links normally go here -->
      </div> <!-- /navigation -->
      
          <?php //if (!empty($content_top)): ?>
            <div id="content-top" class="clear-block">
	       <?php if (!empty($messages)): print $messages; endif; ?>
             <?php print $content_top; ?>
            </div>
          <?php //endif; ?>

      <?php if (!empty($left)): ?>
        <div id="sidebar-left" class="column sidebar">
          <?php print $left; ?>
        </div> <!-- /sidebar-left -->
      <?php endif; ?>



      <div id="main" class="column"><div id="main-squeeze">
        
        <?php if (!empty($mission)): ?><div id="mission"><?php print $mission; ?></div><?php endif; ?>

        <div id="content">
	  <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php if (!empty($content_prefix)) { print $content_prefix; } ?>
          <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
         
          <?php if (!empty($help)): print $help; endif; ?>
          
          <?php if ($is_front): ?>
	    <?php if (!empty($front_content) ): ?>
            <div id="front-content" class="clear-block">
                <?php print $front_content; ?>
            </div> <!-- /front-content -->
	    <?php endif; ?>
          <?php endif; ?>
          
          <div id="content-content" class="clear-block">
            
            <?php print $content; ?>
            
          </div> <!-- /content-content -->
          
          <?php if (!empty($content_bottom)): ?>
              <div id="content-bottom" class="clear-block">
                  <?php print $content_bottom; ?>
              </div> <!-- /content-bottom -->
          <?php endif; ?>
          
          
        </div> <!-- /content -->
        
      </div></div> <!-- /main-squeeze /main -->




      <?php if (!empty($right)): ?>
        <div id="sidebar-right" class="column sidebar">
          <?php print $right; ?>
        </div> <!-- /sidebar-right -->
      <?php endif; ?>



    </div> <!-- container-inner -->
    </div> <!-- /container -->

    <div id="footer-wrapper" >
      <div id="footer" class="container">
        <?php print $footer_message; ?>
        <?php if (!empty($footer)): print $footer; endif; ?>
      </div> <!-- /footer -->
    </div> <!-- /footer-wrapper -->

    <?php print $closure; ?>
  </div> <!-- page-inner -->
  </div> <!-- /page -->


</body>
</html>
