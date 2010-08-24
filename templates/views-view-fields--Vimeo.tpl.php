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

<?php
  $node_id = $fields['nid']->raw;
  $vimeo_id = db_result(db_query("SELECT field_embedded_vid_value FROM {content_type_media_front_video} WHERE nid=%d", $node_id));
  //log_debug('the vimeo id is ', $result);
  $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vimeo_id.php"));
  //log_debug('hash: ', $hash);
  $img = $hash[0]['thumbnail_medium'];
?>

<div class='video-thumbnail'><a href="<?php print drupal_get_path_alias('node/' . $node_id); ?>"><img src="<?php print $img; ?>" /></a></div>
<div class='video-title'><?php print $fields['title']->content ?></div>
<div class='video-description'><?php print $fields['body']->content ?></div>
<div class='clear'></div>