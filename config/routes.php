<?php

return array(
    'login' => 'user/login',
    'user/logout' => 'user/logout',
    // Admin panel
    'admin' => 'admin/index',


    // Sort by
    'sort/([a-z]*)' => 'site/sort/$1',

    // Task add
    'task/add' => 'task/create',

    // Main page
    'page-([0-9]+)' => 'site/index/$1',
    'page-([0-9]+)/([a-z]*-[a-z]*)' => 'site/index/$1/$2',
    'index.php' => 'site/index',
    '' => 'site/index',
);