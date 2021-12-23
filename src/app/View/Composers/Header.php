<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

use \WP\Nav\Walker;

class Header extends Composer
{
    protected static $views = [
        'partials.header',
    ];

    public function override()
    {
        return [
          'mnb' => wp_nav_menu([
            'menu' => 0, 'echo' => false,
            'menu_class' => 'grid',
            'walker' => new Walker\MNav(),
          ]),
        ];
    }

}


