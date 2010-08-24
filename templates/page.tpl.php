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
  <?php print $styles; ?>
  <!--[if IE 7]>
		<link rel="stylesheet" href="/sites/all/themes/SpontaneousAcademia/style-IE7.css" type="text/css" media="all" />
	<![endif]-->
	<!--[if IE 6]>
	        <script type="text/javascript" src="/unitpngfix.js"></script>
		<link rel="stylesheet" href="/sites/all/themes/SpontaneousAcademia/style-IE6.css" type="text/css" media="all" />
	<![endif]-->
  <script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US" type="text/javascript"></script> <!-- make sure this loads before others that need it! -->
  <script type="text/javascript">
//FB.init("990f0319a7449a516ee2032d33478742", "xd_receiver.htm", {"reloadIfSessionStateChanged":true, "ifUserConnected":"front-loggedin", "ifUserNotConnected":"front-anonymous"});
//FB.init("990f0319a7449a516ee2032d33478742", "xd_receiver.htm", {"reloadIfSessionStateChanged":true});
//FB.init("990f0319a7449a516ee2032d33478742");
</script>
  <?php print $scripts; ?>
  <?php if ($is_front): ?>
    <script type="text/javascript" src="http://www.trumba.com/scripts/spuds.js"></script>
  <?php endif; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>


<body class="<?php print $body_classes; ?>">

<script type="text/javascript">
  //FB.init('9eeb90426ff3bfb949986d73aa82d2af', "/xd_receiver.htm", {"reloadIfSessionStateChanged":true});
  FB.init('<?php print variable_get("safacebook_api_key", ""); ?>', "/xd_receiver.htm");
</script>


 <div id="beta">BETA</div>
 
  <div id="page">
    <div id="page-inner">
    <div id="header">
      
      <div id="logo-title">

        <?php if (!empty($logo)): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
          </a>
        <?php endif; ?>

        <div id="name-and-slogan">
          <?php if (!empty($site_name)): ?>
            <h1 id="site-name">
              <a href="<?php print $front_page ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>

          <?php if (!empty($site_slogan)): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /name-and-slogan -->
      </div> <!-- /logo-title -->

      <?php if (!empty($header)): ?>
        <div id="header-region">
          <div id="temp-home-link"><a href="/">&nbsp;</a></div>
	   <?php if ($is_front): ?>
             <div class="front-page-header-text">
                 <div class="node">
                 <div class="content">Advance a free society. Further your research and teaching. Get inspiration and advice. Create a profile and browse our listings of opportunities, resources, events, groups and more.
                 </div>
                 </div>
             </div>
          <?php endif; ?>
          <?php print $header; ?>
        </div>
      <?php endif; ?>

    </div> <!-- /header -->

    <div id="container" class="clear-block">
      <div id="colors-bg-image"></div>
      <div id="navigation" class="menu <?php if (!empty($primary_links)) { print "withprimary"; } if (!empty($secondary_links)) { print " withsecondary"; } ?> ">
        <?php if (!empty($breadcrumb)): ?><div id="breadcrumb"><?php print $breadcrumb; ?></div><?php endif; ?>
	<?php print $navbar; ?>
        <!-- secondary links normally go here -->
      </div> <!-- /navigation -->
      
          <?php //if (!empty($content_top)): ?>
            <div id="content-top" class="clear-block">
              <?php if (!empty($title)): ?><h1 class="title" id="page-title"><?php print $title; ?>
		      <span id="feed-icons"><?php print $feed_icons; ?>
		      <?php if ($is_front): ?>
			  <a class="feed-icon" href="/recent-updates/feed">
			      <img width="16" height="16" title="Recent Updates" alt="Recent Updates" src="/misc/feed.png">
			  </a>
		      <?php endif; ?>
		      </span>
	      </h1><?php endif; ?>
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
          <?php if (!empty($content_prefix)) { print $content_prefix; } ?>
          <?php if (!empty($tabs)): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
          <?php if (!empty($messages)): print $messages; endif; ?>
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




    </div> <!-- /container -->

    <div id="footer-wrapper">
      <div id="footer">
        <?php print $footer_message; ?>
        <?php if (!empty($footer)): print $footer; endif; ?>
      </div> <!-- /footer -->
    </div> <!-- /footer-wrapper -->

    <?php print $closure; ?>
  </div> <!-- page-inner -->
  </div> <!-- /page -->


</body>
</html>
