<?php
// $Id: user-profile.tpl.php,v 1.2.2.1 2008/10/15 13:52:04 dries Exp $

/**
 * @file user-profile.tpl.php
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * By default, all user profile data is printed out with the $user_profile
 * variable. If there is a need to break it up you can use $profile instead.
 * It is keyed to the name of each category or other data attached to the
 * account. If it is a category it will contain all the profile items. By
 * default $profile['summary'] is provided which contains data on the user's
 * history. Other data can be included by modules. $profile['user_picture'] is
 * available by default showing the account picture.
 *
 * Also keep in mind that profile items and their categories can be defined by
 * site administrators. They are also available within $profile. For example,
 * if a site is configured with a category of "contact" with
 * fields for of addresses, phone numbers and other related info, then doing a
 * straight print of $profile['contact'] will output everything in the
 * category. This is useful for altering source order and adding custom
 * markup for the group.
 *
 * To check for all available data within $profile, use the code below.
 *
 * @code
 *   print '<pre>'. check_plain(print_r($profile, 1)) .'</pre>';
 * @endcode
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-field.tpl.php
 *   Where the html is handled for each item in the group.
 *
 * Available variables:
 *   - $user_profile: All user profile data. Ready for print.
 *   - $profile: Keyed array of profile categories and their items or other data
 *     provided by modules.
 *
 * @see template_preprocess_user_profile()
 */
?>
<div class="profile">
  <?php if ( strlen($profile['user_picture']) > 31 ): // prints an empty div if not pic - check string length ?>
    <div id="fb-picture">
     <?php print $profile['user_picture']; ?>
    </div>
  <?php else: ?>
  <div id="fb-picture">
      <?php
        $profile_user = user_load($account->uid);
        $fbid = $profile_user->facebook_id;
        if (!$fbid) { $fbid = '0'; }  // for some crazy reason which I have yet to discover, omitting this causes all fp:profile-pic calls to return a silhouette. in some browsers. in some views. odd.
  ?>
  <fb:profile-pic uid="<?php print $fbid;?>"  size="small" facebook-logo="true" linked="false"></fb:profile-pic>
  </div>
  <?php endif; ?>
  <div class="profile-role">
    <?php //print $main_role; ?>
    <?php print $account->user_type; ?>
  </div>
  <?php print $profile['content_profile']; ?>
  <?php //print $user_profile; ?>
</div>
<?php //print '<pre>'. check_plain(print_r($account, 1)) .'</pre>'; ?>
<?php //print '<pre>'. check_plain(print_r($user, 1)) .'</pre>'; ?>
