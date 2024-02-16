<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Admisi\Database\Seeders\AdmisiDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(MasterSeeder::class);
        $this->call(MenuUserAdmisiSeeder::class);
        $this->call(MenuAdminAdmisiSeeder::class);
        $this->call(AdmisiDatabaseSeeder::class);
    }
}
