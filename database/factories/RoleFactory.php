<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Spatie\Permission\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'guard_name' => 'admin'
    ];
});
