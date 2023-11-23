<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Merk;
use App\Models\Role;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 1
        ]);
        User::create([
            'name'      => 'user',
            'email'     => 'user@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);

        Role::create([
            'role'  => 'admin'
        ]);
        Role::create([
            'role'  => 'user'
        ]);

        Kategori::create([
            'kategori'  => 'Elektronik'
        ]);
        Merk::create([
            'merk'  => 'Lenovo'
        ]);

        Lokasi::create([
            'lokasi'  => 'Gedung Utama'
        ]);
        Lokasi::create([
            'lokasi'  => 'Kantor Satpam'
        ]);
    }
}
