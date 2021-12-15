<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use function Roots\view;

class Report extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'template-report',
        'template-signup',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'bg' => view('partials.img', ['ex' => 'jpg', 'name' => 'header-02'])
        ];
    }
}
