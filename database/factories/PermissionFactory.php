<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

$factory->define(Permission::class, function (Faker $faker) {
    $listPermission = [];

    $config = config('permission.list');
    if (!empty($config)) {
        foreach ($config as $key => $value) {
            foreach ($value as $k => $v) {
                $listPermission[] = [
                    'guard_name' => 'admin',
                    'name' => $v
                ];
            }
        }
    }

    return $listPermission;
});
