<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin_role = Role::updateOrCreate(["name" => "admin"]);

        $user = User::where("email","=","admin@admin")->first();

        $user->assignRole("admin");


        $permissions = ["read", "update", "create", "delete"];
        $models = ["contact", "record", "teen", "user", "visit"];

        foreach ($models as $model) {
            foreach ($permissions as $permission) {
                $permission = Permission::updateOrCreate(["name" => "{$permission}_{$model}"]);
                $admin_role->givePermissionTo($permission);
            }
        }
    }
}
