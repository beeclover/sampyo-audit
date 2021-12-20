<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});


/**
 * 아카이브 '라벨' 제거
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

add_filter('get_the_archive_title', function () {
  if (is_category()) {
      $title = single_cat_title('', false);
  } elseif (is_tag()) {
      $title = single_tag_title('', false);
  } elseif (is_author()) {
      $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_post_type_archive()) {
      $title = post_type_archive_title('', false);
  } elseif (is_tax()) {
      $title = single_term_title('', false);
  }

  return $title;
});


/**
 * 코멘트를 작성했을때 해당글 status 변경
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

add_filter( 'comment_post_redirect', function ( $location, $commentdata ) {
  if(!isset($commentdata) || empty($commentdata->comment_post_ID) ){
    return $location;
  }
  $post_id = $commentdata->comment_post_ID;
  if('my-custom-post' == get_post_type($post_id)){
    return wp_get_referer()."#comment-".$commentdata->comment_ID;
  }
  update_field('status', 'done', $post_id);
  return $location;
}, 10,2 );