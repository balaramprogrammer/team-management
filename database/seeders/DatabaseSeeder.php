<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
 public function run(): void
 {
   $this->call(RoleSeeder::class);
    $this->call(PermissionSeeder::class);

   User::create([
      'name'=>'Admin',
      'email'=>'admin@gmail.com',
      'password'=>bcrypt('12345678'),
      'role_id'=>1
   ]);
 }
}