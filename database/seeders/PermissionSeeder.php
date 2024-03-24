<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       $role_konseling = Role::updateOrCreate([
            'name' => 'konseling',
        ],
        ['name' => 'konseling'],
    );

      $role_siswa = Role::updateOrCreate([
            'name' => 'siswa',
        ],
        ['name' => 'siswa'],
    );

        $permission = Permission::updateOrCreate([
            'name' => 'view_dashboard'
        ],
        [
            'name' => 'view_dashboard'
        ]
    );

    $permission2 = Permission::updateOrCreate([
        'name' => 'view_jadwal'
    ],
    [
        'name' => 'view_jadwal'
    ]
);


    $role_konseling->givePermissionTo($permission);
    $role_siswa->givePermissionTo($permission2);

    $user = User::find(1);
    $user->assignRole(['konseling', 'siswa']);


    }
}
