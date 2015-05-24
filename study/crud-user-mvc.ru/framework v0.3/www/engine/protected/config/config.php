<?php

return [
    'APPLICATION' => [
        'name' => 'My Application',
        'lang' => 'ru',
        'db' => [
            // if db enabled then it is include files from protected/core/db
            'db_enabled' => true,
            'db_name' => 'crudusertest',
            'db_host' => 'localhost',
            'db_user' => 'crudUserTest',
            'db_pass' => '123123',
            'dsn' => 'mysql:host=?host?;dbname=?dbname?',
            'db_debug' => true
        ],
        'components' => [
            'gmvc' => [
                'gmvc_on' => true,
                'gmvc_pass' => '123123'
            ]
        ],
        'settings' => [
            // Logs ON
            'logs_on' => true,
            // Human-friendly URL ON
            'hfurl_on' => true,
            // Cache ON
            'cache_on' => true,
        ],
        'template_path' =>'/engine/templates/newTemplate/',
        'templates' => [
            'default' => 'newTemplate',
            'all_templates' => [
                'default',
                'newTemplate'
            ],
        ],
    ],

    // USER ROLES

    'USER_ROLES' => [
        'ADMIN' => 1,
        'GUEST' => 0,
    ],

    // add an element without key to autoload class, file with class add to a service/

    'autoload' => [

    ],
    'modules' => [
        // key - name module, value - namespace
        'Admin'=>'admin',
        'User'=>'user',
    ]
];