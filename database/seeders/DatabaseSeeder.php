<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ecommerce.com',
            'password' => bcrypt('admin'),
        ]);

        WebsiteSetting::create([
            'name' => 'Ecommerce',
            'email' => 'noreply@ecommerce.com',
            'phone' => '01144884499',
        ]);
    }
}
