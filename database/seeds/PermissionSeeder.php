<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin role
        $adminRole = Role::where('name', 'Administrator')->first();

        if (empty($adminRole)) {
            $adminRole = factory(Role::class)->create(['name' => 'Administrator', 'guard_name' => 'admin']);
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
    }
}
