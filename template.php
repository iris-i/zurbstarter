<?php

//=========External Javascript========
drupal_add_js('http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js', 'external');

//==============PREPROCESS FUNCTIONS=====
function sifacore_preprocess_page(&$vars) {
  // Split primary and secondary local tasks
  $vars['primary_local_tasks'] = menu_primary_local_tasks();
  $vars['secondary_local_tasks'] = menu_secondary_local_tasks();

  /*
    USER ACCOUNT
    Removes the tabs from user  login, register & password
    fixes the titles too so no more "user account" all over
  */
  switch (current_path()) {
    case 'user':
      $vars['title'] = t('Login');
      unset( $vars['primary_local_tasks'] );
      break;
    case 'user/register':
      $vars['title'] = t('New account');
      unset( $vars['primary_local_tasks'] );
      break;
    case 'user/password':
      $vars['title'] = t('I forgot my password');
      unset( $vars['primary_local_tasks'] );
      break;

    default:
      # code...
      break;
  }

  //$vars['main_menu'] = theme('links', array('links' => $vars['main_menu'], 'attributes' => array('class' => 'links main-menu main-nav fix')));
  //$vars['secondary_menu'] = theme('links', array('links' => $vars['secondary_menu'], 'attributes' => array('class' => 'links secondary-menu fix')));


}

/*
 * Pre-Process Node
 */

function sifacore_preprocess_node(&$vars) {
  //global $node;
  $vars['hook'] = 'node';

  $vars['attributes_array']['id'] = "node-{$vars['node']->nid}";

  $vars['title_attributes_array']['class'][] = 'node-title';
  $vars['title_attributes_array']['class'][] = 'clearfix';

  $vars['content_attributes_array']['class'][] = 'node-content';
  $vars['content_attributes_array']['class'][] = 'clearfix';

  if (isset($vars['content']['links'])) {
    $vars['links'] = $vars['content']['links'];
    unset($vars['content']['links']);
  }

  if (isset($vars['content']['comments'])) {
    $vars['post_object']['comments'] = $vars['content']['comments'];
    unset($vars['content']['comments']);
  }
  
// Submitted area done Wordpress style
  if ($vars['display_submitted']) {
   $submitted = '<span class="sword">' . t('by') . ' </span><span class="author vcard fn">' . $vars['name'] . '</span>';
   $submitted .= '<span class="sword"> ' . t('on') . '</span> ' . format_date($vars['changed'], $type = 'custom', $format = 'D M, Y');         
   $submitted .=  '  ' . '<a href="'.$vars['node_url'].'#comments">'. format_plural($vars['comment_count'], '1 Comment', '@count Comments') .'</a>';
   $vars['submitted'] = $submitted;
  }

}

//========Strip CSS================
/**
 * Implements hook_css_alter().
 * Clearer than omitting in .info file.
 * Omitted:
 * - color.css
 * - contextual.css
 * - dashboard.css
 * - field_ui.css
 * - image.css
 * - locale.css
 * - shortcut.css
 * - simpletest.css
 * - toolbar.css
 */
function sifacore_css_alter(&$css) {
  $exclude = array(
    'misc/vertical-tabs.css' => FALSE,
    'modules/aggregator/aggregator.css' => FALSE,
    'modules/block/block.css' => FALSE,
    'modules/book/book.css' => FALSE,
    'modules/comment/comment.css' => FALSE,
    'modules/dblog/dblog.css' => FALSE,
    'modules/file/file.css' => FALSE,
    'modules/filter/filter.css' => FALSE,
    'modules/forum/forum.css' => FALSE,
    'modules/help/help.css' => FALSE,
    'modules/menu/menu.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/openid/openid.css' => FALSE,
    'modules/poll/poll.css' => FALSE,
    'modules/profile/profile.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/statistics/statistics.css' => FALSE,
    'modules/syslog/syslog.css' => FALSE,
    'modules/system/admin.css' => FALSE,
    'modules/system/maintenance.css' => FALSE,
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    //'modules/system/system.base.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    //'modules/system/system.messages.css' => FALSE,
    'modules/system/system.theme.css' => FALSE,
    'modules/taxonomy/taxonomy.css' => FALSE,
    'modules/tracker/tracker.css' => FALSE,
    'modules/update/update.css' => FALSE,
    'modules/user/user.css' => FALSE,
  );
  $css = array_diff_key($css, $exclude);
}