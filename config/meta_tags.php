<?php

use Butschster\Head\MetaTags\Viewport;

return [
    /*
     * Meta title section
     */
    'title' => [
        'default' => env('APP_NAME'),
        'separator' => '-',
        'max_length' => 255,
    ],


    /*
     * Meta description section
     */
    'description' => [
        'default' => 'Pentale is a hub of web novels',
        'max_length' => 255,
    ],


    /*
     * Meta keywords section
     */
    'keywords' => [
        'default' => 'web novel, book, tale, story, read, write, publish, author, chapter',
        'max_length' => 255
    ],

    /*
     * Default packages
     *
     * Packages, that should be included everywhere
     */
    'packages' => [
        // 'jquery', 'bootstrap', ...
    ],

    'canonical' => env('APP_URL'),
    'charset' => 'utf-8',
    'robots' => null,
    'viewport' => Viewport::RESPONSIVE,
    'csrf_token' => true,
];
