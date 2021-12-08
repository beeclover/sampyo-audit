<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Login extends Composer
{
    function __construct()
    {
    }

    protected static $views = [
        'template-login',
    ];

    public function override()
    {
        return [];
    }
}
