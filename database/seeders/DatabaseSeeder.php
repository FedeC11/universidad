<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class]);
        //User::factory(10)->create();

        $user = User::create([
            "name" => "fede cuautle",
            "email" => "admin@admin",
            "password" => Hash::make("admin")
        ]);

        $user2 = User::create([
            "name" => "juan perez",
            "email" => "alumno@alumno",
            "password" => Hash::make("alumno")
        ]);
        $user3 = User::create([
            "name" => "jose osorio",
            "email" => "maestro@maestro",
            "password" => Hash::make("maestro")
        ]);
        $user2->assignRole('alumno');
        $user->assignRole("admin");
        $user3->assignRole("maestro");

        Student::create([
            "nombre" => "juan",
            "apellido" => "perez",
            "direccion" => "las manzanas #23",
            "fecha_cumpleaños" => "2000-01-27",
            "matricula" => "gehsy1734",
            "id_user_fk" => "2"
            
        ]);
        
        Teacher::create([
            "nombre" => "jose",
            "apellido" => "osorio",
            "direccion" => "las reynas #101",
            "fecha_cumpleaños" => "2000-01-27",
            "id_user_fk" => "3"
            
        ]);

        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
