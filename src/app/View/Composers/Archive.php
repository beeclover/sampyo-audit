<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use \WP\Archive\UI;

class Archive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive',
        'archive-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
          'count' => $this->getCount(),
          'pagination' => (new UI\Pagination())->render(),
        ];
    }

    public function getCount()
    {
      if ($type = get_post_type()) {
        $count = wp_count_posts($type)->publish;
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $paged = $paged - 1;
        $posts_per_page = get_option( 'posts_per_page' );
        return $count - ( $paged * $posts_per_page );
      }
    }
}
