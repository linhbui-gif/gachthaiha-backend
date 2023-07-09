<?php

return [

    'models' => [

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         * The model you want to use as a Permission model needs to implement the
         * `Spatie\Permission\Contracts\Permission` contract.
         */

        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         *
         * The model you want to use as a Role model needs to implement the
         * `Spatie\Permission\Contracts\Role` contract.
         */

        'role' => Spatie\Permission\Models\Role::class,

    ],

    'table_names' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'roles',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_roles' => 'model_has_roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'role_has_permissions',
    ],

    'column_names' => [

        /*
         * Change this if you want to name the related model primary key other than
         * `model_id`.
         *
         * For example, this would be nice if your primary keys are all UUIDs. In
         * that case, name this `model_uuid`.
         */

        'model_morph_key' => 'model_id',
    ],

    /*
     * When set to true, the required permission/role names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_permission_in_exception' => false,

    'cache' => [

        /*
         * By default all permissions are cached for 24 hours to speed up performance.
         * When permissions or roles are updated the cache is flushed automatically.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * The cache key used to store all permissions.
         */

        'key' => 'spatie.permission.cache',

        /*
         * When checking for a permission against a model by passing a Permission
         * instance to the check, this key determines what attribute on the
         * Permissions model is used to cache against.
         *
         * Ideally, this should match your preferred way of checking permissions, eg:
         * `$user->can('view-posts')` would be 'name'.
         */

        'model_key' => 'name',

        /*
         * You may optionally indicate a specific cache driver to use for permission and
         * role caching using any of the `store` drivers listed in the cache.php config
         * file. Using 'default' here means to use the `default` set in cache.php.
         */

        'store' => 'default',
    ],

    'list' => [
        'administrator' => [
            'list'      => 'administrator.list',
            'create'    => 'administrator.create',
            'update'    => 'administrator.update',
            'delete'    => 'administrator.delete'
        ],
        'banner' => [
            'list'      => 'banner.list',
            'create'    => 'banner.create',
            'update'    => 'banner.update',
            'delete'    => 'banner.delete'
        ],
        'contact' => [
            'list'      => 'contact.list',
            'create'    => 'contact.create',
            'update'    => 'contact.update',
            'delete'    => 'contact.delete'
        ],
        'customer' => [
            'list'      => 'customer.list',
            'create'    => 'customer.create',
            'update'    => 'customer.update',
            'delete'    => 'customer.delete'
        ],
        'menu' => [
            'list'      => 'menu.list',
            'create'    => 'menu.create',
            'update'    => 'menu.update',
            'delete'    => 'menu.delete'
        ],
        'news_category' => [
            'list'      => 'news_category.list',
            'create'    => 'news_category.create',
            'update'    => 'news_category.update',
            'delete'    => 'news_category.delete'
        ],
        'news' => [
            'list'      => 'news.list',
            'create'    => 'news.create',
            'update'    => 'news.update',
            'delete'    => 'news.delete'
        ],
        'order' => [
            'list'      => 'order.list',
            'create'    => 'order.create',
            'update'    => 'order.update',
            'delete'    => 'order.delete'
        ],
        'page' => [
            'list'      => 'page.list',
            'create'    => 'page.create',
            'update'    => 'page.update',
            'delete'    => 'page.delete'
        ],
        'partner' => [
            'list'      => 'partner.list',
            'create'    => 'partner.create',
            'update'    => 'partner.update',
            'delete'    => 'partner.delete'
        ],
        'product' => [
            'list'      => 'product.list',
            'create'    => 'product.create',
            'update'    => 'product.update',
            'delete'    => 'product.delete'
        ],
        'product_category' => [
            'list'      => 'product_category.list',
            'create'    => 'product_category.create',
            'update'    => 'product_category.update',
            'delete'    => 'product_category.delete'
        ],
        'role' => [
            'list'      => 'role.list',
            'create'    => 'role.create',
            'update'    => 'role.update',
            'delete'    => 'role.delete'
        ],
        'setting' => [
            'list'      => 'setting.list',
            'create'    => 'setting.create',
            'update'    => 'setting.update',
            'delete'    => 'setting.delete'
        ],
        'subscription' => [
            'list'      => 'subscription.list',
            'create'    => 'subscription.create',
            'update'    => 'subscription.update',
            'delete'    => 'subscription.delete'
        ],
        'customer_review' => [
            'list'      => 'customer_review.list',
            'create'    => 'customer_review.create',
            'update'    => 'customer_review.update',
            'delete'    => 'customer_review.delete'
        ],
        'size' => [
            'list'      => 'size.list',
            'create'    => 'size.create',
            'update'    => 'size.update',
            'delete'    => 'size.delete'
        ],
        'product_type' => [
            'list'      => 'product_type.list',
            'create'    => 'product_type.create',
            'update'    => 'product_type.update',
            'delete'    => 'product_type.delete'
        ],
        'product_surface' => [
            'list'      => 'product_surface.list',
            'create'    => 'product_surface.create',
            'update'    => 'product_surface.update',
            'delete'    => 'product_surface.delete'
        ],
        'product_comment' => [
            'list'      => 'product_comment.list',
            'create'    => 'product_comment.create',
            'update'    => 'product_comment.update',
            'delete'    => 'product_comment.delete'
        ],
        'product_review' => [
            'list'      => 'product_review.list',
            'create'    => 'product_review.create',
            'update'    => 'product_review.update',
            'delete'    => 'product_review.delete'
        ],
        'brand' => [
            'list'      => 'brand.list',
            'create'    => 'brand.create',
            'update'    => 'brand.update',
            'delete'    => 'brand.delete'
        ]
    ]
];
