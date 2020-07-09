<?php

return array(
    'login' => 'user/login',
    'logout' => 'user/logout',

    // Task add
    'task/add' => 'task/create',

    // Main page
    'sort/([a-z]*)' => 'site/sort/$1',
    'page-([0-9]+)' => 'site/index/$1',
    'page-([0-9]+)/([a-z]*-[a-z]*)' => 'site/index/$1/$2',
    'index.php' => 'site/index',
    '' => 'site/index',



    // Admin panel
    'admin' => 'admin/index',
    'admin/page-([0-9]+)' => 'admin/index/$1',

    // Task update | delete by Admin
    'admin/task/update/([0-9]+)' => 'adminTask/update/$1',
    'admin/task/delete/([0-9]+)' => 'adminTask/delete/$1',
);