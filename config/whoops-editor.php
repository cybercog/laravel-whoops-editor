<?php

/*
 * This file is part of Laravel Whoops Editor.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Application Whoops Editor
    |--------------------------------------------------------------------------
    |
    | When using the pretty error page feature, whoops comes with the ability
    | to open referenced files directly in your IDE or editor. This feature
    | only works in case your php-source files are locally accessible to
    | the machine on which the editor is installed.
    |
    | Supported: "emacs", "idea", "macvim", "phpstorm", "sublime", "textmate", "xdebug", "vscode"
    | See: https://github.com/filp/whoops/blob/master/docs/Open%20Files%20In%20An%20Editor.md
    |
    */
    'editor' => env('APP_EDITOR', null),

    /*
    |--------------------------------------------------------------------------
    | Editors Configuration
    |--------------------------------------------------------------------------
    |
    | Specify custom editors and configuration in this section.
    |
    */
    'editors' => [

        'idea' => [
            'url' => 'http://localhost:63342/api/file/?file=%file&line=%line',
            'ajax' => true,
        ],

        'phpstorm' => [
            'url' => 'http://localhost:63342/api/file/?file=%file&line=%line',
            'ajax' => true,
        ],

        'sublime' => 'subl://%file:%line',

    ],

    /*
    |--------------------------------------------------------------------------
    | Local Sites Path
    |--------------------------------------------------------------------------
    |
    | Specify the local development folder that is synchronized with Homestead.
    | If you are not using Homestead, set this to an empty string or null.
    | This corresponds to the `-map:` line under `folders` in your
    | `Homestead.yaml` file.
    |
    | Default: ~/projects (string|null)
    |
    */
    'local-projects-path' => '~/projects',

    /*
    |--------------------------------------------------------------------------
    | Homestead Sites Path
    |--------------------------------------------------------------------------
    |
    | Specify the base path where Homestead stores the synced folder with your
    | web sites. If you are not using Homestead, set this to an empty string
    | or null. This corresponds to the `to:` line under `folders` in
    | your Homestead.yaml file.
    |
    | Default: /home/vagrant/projects (string|null)
    |
    */
    'homestead-projects-path' => '/home/vagrant/projects',

];
