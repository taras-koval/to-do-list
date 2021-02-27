<?php

return [
    // User
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',

    // Lists
    'user/lists' => 'list/index',
    'list/([0-9]+)' => 'list/view/$1',
    'list/del/([0-9]+)/([0-9]+)' => 'list/del/$1/$2',
    
    // Main
    '.+' => 'main/notFound',
    '' => 'main/index'
];