<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        // Crear el usuario administrador de forma manual (Seguro para producción)
        User::updateOrCreate(
            ['email' => 'admin@admin.com'], // Busca si ya existe por email
            [
                'name' => 'Administrador',
                'password' => Hash::make(env('ADMIN_PASSWORD')), // Hasheado correctamente
                'email_verified_at' => now(),
            ]
        );
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if (app()->environment('local')) {
            $this->call(Usuario::class);
        }
    }
}
