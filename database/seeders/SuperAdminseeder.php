<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole = Role::firstOrCreate(['name'=>'superadmin']);

        $permissions = [
            'manage_teachers',
            'manage_students',
            'manage_classes',
            'manage_courses',
            'manage_fees',
            'manage_expenses',
            'view_reports',
            'attendance_manage'
        ];

        foreach($permissions as $perm){
            $p = Permission::firstOrCreate(['name'=>$perm]);
            $superadminRole->permissions()->syncWithoutDetaching([$p->id]);
        }

        User::updateOrCreate([
            'email' => 'superadmin@school.com'
        ],[
            'name' => 'Super Admin',
            'password' => Hash::make('password123'),
            'role_id' => $superadminRole->id
        ]);
    }
}
