<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'pasien-list',
           'pasien-create',
           'pasien-edit',
           'pasien-delete',
           'rekam-medis-list',
           'rekam-medis-create',
           'rekam-medis-edit',
           'rekam-medis-delete',
           'ruang-list',
           'ruang-create',
           'ruang-edit',
           'ruang-delete',
           'obat-list',
           'obat-create',
           'obat-edit',
           'obat-delete',
           'kartu-kes-list',
           'kartu-kes-create',
           'kartu-kes-edit',
           'kartu-kes-delete'
        ];
   
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
