<?php

return [

    'name' => 'Laravel-admin',

    'logo' => '<b>Laravel</b> admin',

    'logo-mini' => '<b>La</b>',

    'bootstrap' => app_path('Admin/bootstrap.php'),

  'route' => [
    'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),
    'namespace' => 'App\\Admin\\Controllers',
    'middleware' => ['web', 'admin'],
],

    'directory' => app_path('Admin'),

    'title' => 'Admin',

    'https' => env('ADMIN_HTTPS', false),

    'auth' => [
        'controller' => App\Admin\Controllers\AuthController::class,
        'guard' => 'admin',
        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],
        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => App\Models\User::class, 
            ],
        ],
        'remember' => true,
        'redirect_to' => 'auth/login',
        'excepts' => [
            'auth/login',
            'auth/logout',
        ],
    ],

    'upload' => [
        'disk' => 'admin',
        'directory' => [
            'image' => 'images',
            'file'  => 'files',
        ],
    ],

    'database' => [
        'connection' => '',
        'users_table' => 'users',
        'users_model' => App\Models\User::class,
        'roles_table' => 'roles',
        'roles_model' => App\Models\Role::class,
        'permissions_table' => 'permissions',
        'permissions_model' => App\Models\Permission::class,
        'menu_table' => 'menu',
        'menu_model' => Encore\Admin\Auth\Database\Menu::class,
        'operation_log_table'    => 'operation_log',
        'user_permissions_table' => 'user_permissions',
        'role_users_table'       => 'role_users',
        'role_permissions_table' => 'role_permissions',
        'role_menu_table'        => 'role_menu',
    ],

    'operation_log' => [
        'enable' => true,
        'allowed_methods' => ['GET', 'HEAD', 'POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'TRACE', 'PATCH'],
        'except' => [
            env('ADMIN_ROUTE_PREFIX', 'admin').'/auth/logs*',
        ],
    ],

    'check_route_permission' => false,
    'check_menu_roles'       => false,

    'default_avatar' => '/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg',

    'map_provider' => 'google',

    'skin' => env('ADMIN_SKIN', 'skin-blue-light'),

    'layout' => ['sidebar-mini', 'sidebar-collapse'],

    'login_background_image' => '',

    'show_version' => true,
    'show_environment' => true,

    'menu_bind_permission' => false,

    'enable_default_breadcrumb' => true,

    'minify_assets' => [
        'excepts' => [],
    ],

    'enable_menu_search' => true,

    'menu_exclude' => [
        '_handle_selectable_',
        '_handle_renderable_',
    ],

    'top_alert' => '',

    'grid_action_class' => \Encore\Admin\Grid\Displayers\DropdownActions::class,

    'extension_dir' => app_path('Admin/Extensions'),

    'extensions' => [],
];
