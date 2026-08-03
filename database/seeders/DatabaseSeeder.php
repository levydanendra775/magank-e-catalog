<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $adminRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Admin']);
        $petugasRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'Petugas']);

        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@magetan.go.id',
            'password' => bcrypt('password'),
        ]);
        
        $admin->assignRole($adminRole);
        
        $petugas = User::factory()->create([
            'name' => 'Petugas Magetan',
            'email' => 'petugas@magetan.go.id',
            'password' => bcrypt('password'),
        ]);
        
        $petugas->assignRole($petugasRole);

        // Sync data wisata (aman dijalankan berulang kali - menggunakan updateOrInsert)
        $this->call([
            WisataSeeder::class,
        ]);
    }
}
