<?php
// $Id: views-view-fields.tpl.php,v 1.6 2008/09/24 22:48:21 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<div class="og-member-photo">
  <?php
    //log_debug("uid:: ", $fields['uid']->content);
    $og_member = user_load($fields['uid']->content);
    $fbid = $og_member->facebook_id;
    if (!$fbid) { $fbid = '0'; } 
  ?>
  <?php if ( strlen($picture) > 31): ?>
        <a href="/user/<?php print $og_member->uid; ?>"><?php print $picture ?></a>
    <?php else: ?>
        <a href="/user/<?php print $og_member->uid; ?>"><fb:profile-pic uid="<?php print $fbid;?>"  size="small" facebook-logo="true" linked="false"></fb:profile-pic></a>
    <?php endif; ?>
</div>
<div class="og-member-name">
  <a href="/user/<?php print $og_member->uid; ?>"><?php print $og_member->name; ?></a><span class="og-admin"><?php print $fields['is_admin']->content; ?></span>
</div>


<?php //log_debug("fields: ", $fields); ?>
<?php //print '<pre>' . print_r($fields, true) . '</pre>'; ?>