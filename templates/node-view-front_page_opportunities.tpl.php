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

<div class="recent-post-user-picture-wrapper">
<div class="recent-post-user-picture">
   <div class="recent-post-user-picture-inner">
   <div class="post-count">
     <?php print user_stats_get_stats('post_count', $node->uid); ?>
  </div>
  <?php //print $picture ?>
  <?php
   $recent_post_user = user_load($uid);
   $fbid = $recent_post_user->facebook_id;
   if (!$fbid) { $fbid = '0'; }  // for some crazy reason which I have yet to discover, omitting this causes all fp:profile-pic calls to return a silhouette. in some browsers. in some views. odd.
    //$facebook_pic_square = safacebook_get_user_photo_square($uid);
  ?>
  <?php if ( strlen($picture) > 31): ?>
        <a href="/user/<?php print $recent_post_user->uid; ?>"><?php print $picture ?></a>
    <?php else: ?>
        <a href="/user/<?php print $recent_post_user->uid; ?>"><fb:profile-pic uid="<?php print $fbid;?>"  size="square" facebook-logo="true" linked="false"></fb:profile-pic></a>
    <?php endif; ?>
 </div>

  <div class="recent-post-user-name">
    <?php print $recent_post_user->name; ?>
  </div>
  <div class="recent-post-user-type">
     <?php print $recent_post_user->user_type; ?>
  </div>
</div>
</div>


<div class="recent-posts-content">
<?php if (!$page): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>

 
  <div class="meta">
  <?php if ($terms): ?>
    <div class="terms terms-inline">
        <?php //print $terms ?>
        
    </div>
  <?php endif;?>
  </div>

  <div class="content">
    <?php print $content ?>
    <?php if ($teaser): ?>
    <div class="node-more-link"><?php print l('More', $node->path); ?></div>
  <?php endif; ?>
  </div>
  
  
  
  <?php //log_debug("node content: ", $node->content); ?>
  <?php //print $links; ?>
</div>
</div>