<?php

return array(
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    // Admin panel
    'admin' => 'admin/index',



    // Main page
    'page-([0-9]+)' => 'site/index/$1',
    'index.php' => 'site/index',
    '' => 'site/index',
);