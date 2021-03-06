<?php
// $Id: node.tpl.php,v 1.4.2.1 2009/08/10 10:48:33 goba Exp $

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<div class="facebook-user-picture-top"></div>
<div class="facebook-user-picture">
  <div class="post-count">
     <?php print user_stats_get_stats('post_count', $node->uid); ?>
  </div>
  <?php //print $picture ?>
  <?php
    $recent_post_user = user_load($uid);
    //$facebook_pic_square = safacebook_get_user_photo_square($uid);
  ?>
  <fb:profile-pic uid="<?php print $recent_post_user->facebook_id;?>"  size="square" facebook-logo="true"></fb:profile-pic>
  <div class="post-user-name">
    <?php print $recent_post_user->name; ?>
  </div>
  <div class="post-user-type">
     <?php print $recent_post_user->user_type; ?>
  </div>
</div>
<div class="facebook-user-picture-bottom"></div>

<?php if (!$page): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

  
  <div class="meta">
  <?php if ($submitted): ?>
    <span class="submitted"><?php //print $submitted ?></span>
  <?php endif; ?>

  <?php if ($terms): ?>
    <div class="terms terms-inline"><?php //print $terms ?></div>
  <?php endif;?>
  </div>

  <div class="content">
    <?php print $content ?>
  </div>

  <?php if (!$teaser): ?>
  <?php if (!user_is_logged_in()): ?>
  <div id="node-fb-login"><a onclick="FB.Connect.requireSession(); return false;" href="#"><img id="fb_login_image" src="/sites/all/themes/SpontaneousAcademia/images/login-button.gif" alt="Connect" /></a> to post comments.</div>
  <?php else: ?>
    <?php print $links; ?>
  <?php endif; ?>
  <?php endif; ?>

  
</div>