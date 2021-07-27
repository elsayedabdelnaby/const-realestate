<?php

return [
    'role_structure' => [
        'super_admin' => [
            'users' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
            'features' => 'c,r,u,d',
            'property_types' => 'c,r,u,d',
            'property_statuses' => 'c,r,u,d',
            'currencies' => 'c,r,u,d',
            'agencies' => 'c,r,u,d',
            'properties' => 'c,r,u,d',
            'blogs' => 'c,r,u,d',
            'why_choose_us' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'partners' => 'c,r,u,d',
            'whychooseus' => 'c,r,u,d',
            'contactusinfo' => 'u',
            'sitesettings' => 'u',
            'seo' => 'c,r,u,d',
            'subscribers' => 'c,r,u,d',
            'projects' => 'c,r,u,d',
        ],
        'admin' => [

        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
