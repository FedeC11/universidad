<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'maestro']);
        $role3 = Role::create(['name' => 'alumno']);

        $permission = Permission::create(['name' => 'ver dashboard'])->syncRoles([$role1,$role2,$role3]);
        $permission = Permission::create(['name'=>'edit permisos'])->assignRole($role1);
        $permission = Permission::create(['name'=>"editar usuarios"])->assignRole($role1);
        $permission = Permission::create(["name"=>"editar maestros"])->assignRole($role1);
        $permission = Permission::create(['name'=>"editar clases"])->assignRole($role1);
        $permission = Permission::create(['name'=>"editar alumnos"])->assignRole($role1);
        $permission = Permission::create(['name'=>"editar calificacion"])->syncRoles($role2);
        $permission = Permission::create(['name'=>"editar mensajes"])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name'=>"ver calificacion"])->assignRole($role3);
        $permission = Permission::create(['name'=>"administrar clases"])->assignRole($role3);
        
    }
}
