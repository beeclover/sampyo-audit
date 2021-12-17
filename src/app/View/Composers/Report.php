<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Report extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-report',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
          'email' => get_the_author_meta('email'),
          'contact' => get_the_author_meta('contact'),
          'name' => get_the_author_meta('last_name'),
          'files' => $this->getFiles(),
          'answer' => $this->getAnswer(),
        ];
    }

    public function getFiles()
    {
      if(!empty($af = get_field('attached-files'))) {
        $result = array_map(function ($file) {
          $id = $file['file'];
          $url = wp_get_attachment_url($id);
          $ext = preg_replace("#\?.*#", "", pathinfo($url, PATHINFO_EXTENSION));
          return ["url" => $url, "name" => get_the_title($id).'.'.$ext];
        }, $af);
        return $result;
      }
      return [];
    }

    public function getAnswer()
    {
      $comments = get_comments(array (
        'post_id' => get_the_ID(),
      ));
      if (!empty($comments)) {
        return $comments[count($comments) - 1];
      }
      return '';
    }
}
