<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Models\Administrator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Administrator::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456'), // 123456
        'remember_token' => str_random(10),
        'status' => 1
    ];
});

$factory->afterCreating(Administrator::class, function ($staff) {

    // create admin role
    $adminRole = Role::where('name', 'Administrator')->first();

    if (empty($adminRole)) {
        $adminRole = factory(Role::class)->create(['name' => 'Administrator', 'guard_name' => 'staff']);
    }

    // create permission from config
    $permissionInDB = Permission::pluck('name')->toArray();

    $allPermission = factory(Permission::class)->raw();

    $listPermission = [];
    if (!empty($permissionInDB)) {
        foreach ($allPermission as $key => $value) {
            if (!in_array($value['name'], $permissionInDB)) {
                $listPermission[] = $value;
            }
        }
    } else {
        $listPermission = $allPermission;
    }

    Permission::insert($listPermission);

    $listPermission = Permission::pluck('name')->toArray();

    // sync all permission to admin role
    $adminRole->syncPermissions($listPermission);

    // sync admin role to staff
    $staff->syncRoles($adminRole);
});