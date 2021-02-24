<?php

return [
    // 'user/edit' => 'user/edit',
    // 'user' => 'user/index',

    // 'movie/([0-9]+)' => 'movie/view/$1',
    // 'movie/add/([0-9]+)' => 'movie/add/$1',

    // 'search/([a-z]+)' => 'search/title/$1',
    
    
    '.+' => 'main/notFound',
    '' => 'main/index'
];