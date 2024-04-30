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
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $studentRole->givePermissionTo([
            'view courses',
        ]);

        // membuat data user super admin untuk mengelola data awal
        // data kategori, kelas, dsb
        $user = User::create([
            'name' => 'Shelma Bakir',
            'avatar' => 'images/default-avatar.png',
            'email' => 'shelma@owner.com',
            'password' => bcrypt('123456789'),
        ]);

        $user->assignRole($teacherRole);
    }
}
