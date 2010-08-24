<?php
// $Id: comment.tpl.php,v 1.4.2.1 2008/03/21 21:58:28 goba Exp $

/**
 * @file comment.tpl.php
 * Default theme implementation for comments.
 *
 * Available variables:
 * - $author: Comment author. Can be link or plain text.
 * - $content: Body of the post.
 * - $date: Date and time of posting.
 * - $links: Various operational links.
 * - $new: New comment marker.
 * - $picture: Authors picture.
 * - $signature: Authors signature.
 * - $status: Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview.
 * - $submitted: By line with date and time.
 * - $title: Linked title.
 *
 * These two variables are provided for context.
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * @see template_preprocess_comment()
 * @see theme_comment()
 */
?>
<div class="comment<?php print ($comment->new) ? ' comment-new' : ''; print ' '. $status ?> clear-block">
  <?php print $picture ?>
<div class="facebook-user-picture">
  <div class="facebook-user-picture-inner">
  <div class="post-count">
     <?php print user_stats_get_stats('post_count', $comment->uid); ?>
  </div>
  <?php //print $picture ?>
  <?php
    $comment_user = user_load($comment->uid);
    //$facebook_pic_square = safacebook_get_user_photo_square($uid);
  ?>
  <a href="/user/<?php print $comment_user->uid; ?>"><fb:profile-pic uid="<?php print $comment_user->facebook_id;?>"  size="square" facebook-logo="true" linked="false"></fb:profile-pic></a>
  </div>
  <div class="post-user-name">
    <?php print $comment_user->name; ?>
  </div>
  <div class="post-user-type">
     <?php print $comment_user->user_type; ?>
  </div>
</div>

  <?php if ($comment->new): ?>
    <span class="new"><?php print $new ?></span>
  <?php endif; ?>

  <h3><?php print $title ?></h3>

  <div class="submitted">
    <?php print $submitted ?>
  </div>

  <div class="content">
    <?php print $content ?>
    <?php if ($signature): ?>
    <div class="user-signature clear-block">
      <?php print $signature ?>
    </div>
    <?php endif; ?>
  </div>

  <?php print $links ?>
</div>
