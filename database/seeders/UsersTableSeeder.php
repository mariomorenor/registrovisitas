<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(["email" => "admin@admin"], [
            "name" => "Administrador",
            "password" => Hash::make("admin")
        ]);

        User::updateOrCreate(["email" => "user@user"], [
            "name" => "Usuario",
            "password" => Hash::make("user")
        ]);
    }
}
