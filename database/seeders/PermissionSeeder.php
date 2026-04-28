<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $permissions = [
            ['name'=>'create_project'],
            ['name'=>'view_project'],
            ['name'=>'edit_project'],
            ['name'=>'delete_project'], 
        ];

        foreach($permissions as $permission)
        {
            Permission::create($permission);
        }
    }
}
