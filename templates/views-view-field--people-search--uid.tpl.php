<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */
?>
<?php //dd($output); ?>
<?php
        $profile_user = user_load($output);
        $fbid = $profile_user->facebook_id;
        if (!$fbid) { $fbid = '0'; }  // for some crazy reason which I have yet to discover, omitting this causes all fp:profile-pic calls to return a silhouette. in some browsers. in some views. odd.
        //print '<div class="facebook-picture"><fb:profile-pic uid="' . $fbid . '"  size="normal" width="100" facebook-logo="true" linked="false"></fb:profile-pic></div>';
?>
<div class="facebook-picture">
<?php print theme('kosmos_user_picture', $profile_user, $fbid, 100); ?>
</div>

<div class="people-search-user-info">
<?php
$profile_node = content_profile_load('profile', $output);
//dd($profile_node);
$college = node_load($profile_node->field_university[0]['nid']);
print '<h3>' . l($profile_user->name, "user/$output") . '</h3>' . $profile_user->user_type . ', ' . $college->title . ', ' . $profile_node->field_academic_discipline[0]['value'] ;
?>
</div>
<div class="clear">&nbsp;</div>
<?php //print $output; ?>