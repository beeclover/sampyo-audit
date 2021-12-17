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
        'archive-report',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
        ];
    }
}
