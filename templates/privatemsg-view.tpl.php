<?php
// $Id: privatemsg-view.tpl.php,v 1.1.2.7 2009/11/19 15:59:55 berdir Exp $
// Each file loads it's own styles because we cant predict which file will be
// loaded.
drupal_add_css(drupal_get_path('module', 'privatemsg') . '/styles/privatemsg-view.css');
?>
<?php print $anchors; ?>
<div class="privatemsg-box-fb" id="privatemsg-mid-<?php print $mid; ?>">
  <div class="left-column">
    <div class="avatar-fb">
      <?php //print $author_picture; ?>
      <?php //log_debug('the pmsg is ', $message); ?>
      
      <div class="facebook-user-picture">
        <div class="facebook-user-picture-inner">
          <div class="post-count">
              <?php print user_stats_get_stats('post_count', $message['author']->uid); ?>
          </div>
          <?php
              $pmsg_user = user_load($message['author']->uid);
              //$facebook_pic_square = safacebook_get_user_photo_square($uid);
              $fbid = $pmsg_user->facebook_id;
              if (!$fbid) { $fbid = '0'; }  // for some crazy reason which I have yet to discover, omitting this causes all fp:profile-pic calls to return a silhouette. in some browsers. in some views. odd.
          ?>
          <?php if ( $author_picture ): ?>
            <a href="/user/<?php print $pmsg_user->uid; ?>"><?php print $author_picture ?></a>
          <?php else: ?>
            <a href="/user/<?php print $pmsg_user->uid; ?>"><fb:profile-pic uid="<?php print $fbid;?>"  size="square" facebook-logo="true" linked="false"></fb:profile-pic></a>
          <?php endif; ?>
        </div>
        
  <div class="post-user-name">
    <?php print $pmsg_user->name; ?>
  </div>
  <div class="post-user-type">
     <?php print $pmsg_user->user_type; ?>
  </div>
</div>
      
    </div>
  </div>
  <div class="middle-column">
    <div class="name">
      <?php print $author_name_link; ?>
    </div>
    <div class="date">
      <?php print $message_timestamp; ?>
    </div>
  </div>
  <div class="right-column">
    <div class="message-body">
      <?php if (isset($new)) : ?>
        <span class="new"><?php print $new ?></span>
      <?php endif ?>
      <?php print $message_body; ?>
    </div>
    <?php if ( isset($message_actions)) : ?>
       <?php print $message_actions ?>
    <?php endif ?>
  </div>
  <div class="clear-both bottom-border"></div>
</div>