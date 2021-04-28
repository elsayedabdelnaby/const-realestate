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
