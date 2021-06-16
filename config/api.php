<?php

return [
    'registration_types' => [
        [
            'type' => 'kupac',
            'file' => 'auth.register',
            'title' => 'Kupac',
            'route_name' => 'register',
            'route_param' => "kupac",
            'icon' => 'front/images/icons/user_customer.svg',
            'status' => 'enabled'
        ],
        [
            'type' => 'proizvodjac',
            'file' => 'front.pages.registracijaProizvodjac',
            'title' => 'Proizvođač',
            'route_name' => 'register',
            'route_param' => "proizvodjac",
            'icon' => 'front/images/icons/user_merchant.svg',
            'status' => 'enabled'
        ]
    ],
    'allowed_roles' => [
        'front' => ['user', 'admin', 'super_admin'],
        'back' => ['admin', 'super_admin']
    ],
    'statuses' => [
        'active' => 'active',
        'inactive' => 'inactive'
    ],
    'storage_paths' => [
        'users' => 'public/users/',
        'posts' => 'public/posts/',
        'teams' => 'public/teams/',
        'category' => 'public/category/',
        'product' => 'public/product/',
    ],
     'storage_paths_v2' => [
        'users' => 'storage/users/',
        'posts' => 'storage/posts/',
        'teams' => 'storage/teams/',
        'category' => 'storage/category/',
        'product' => 'storage/product/',
    ],
    'route-paths' => [
        'store' => 'store',
        'update' => 'update',
        'delete' => 'delete'
    ],
    'roles' => [
        'privileged' => [
            'super_privileged' => [
                'super_admin' => 'super_admin'
            ],
            'normal_privileged' => [
                'admin' => 'admin'
            ]
        ],
        'unprivileged' => [
            'user' => 'user'
        ]
    ],
    'super-admins' => ['elezovic3388@gmail.com', 'ribiczijah@gmail.com', 'almir_zukan@yahoo.com', 'budimirivan0@gmail.com', 'info@katrieldev.com']
];
