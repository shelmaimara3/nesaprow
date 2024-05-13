<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // membuat permission untuk mengakses sebuah halaman pada role user
        $permissions = [
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
            'view teachers',
            'create projects',
            'view projects',
            'edit projects',
            'create guides',
            'delete guides',
        ];

        // setiap user bisa memiliki beberapa permission
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        $teacherRole->givePermissionTo([
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
            'view categories',
            'create categories',
            'edit categories',
            'delete categories',
            'view teachers',
            'view projects',
            'edit projects',
            'create guides',
            'delete guides',
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view courses',
            'create projects',
            'view projects',
        ]);

        // membuat data user super admin untuk mengelola data awal
        // data kategori, kelas, dsb
        $user = User::create([
            'name' => 'Shelma Bakir',
            'avatar' => 'images/photos/default-photo.svg',
            'email' => 'shelma@owner.com',
            'password' => bcrypt('123456789'),
        ]);

        $user->assignRole($teacherRole);
    }
}
