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
        if (!\App\Models\User::where('email', 'humaidi@admin.com')->exists()) {
            \App\Models\User::factory()->create([
                'name' => 'Admin Utama',
                'email' => 'humaidi@admin.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
            ]);
        }

        $this->call([
            CategorySeeder::class,
        ]);

        // Settings defaults
        \App\Models\Setting::firstOrCreate(['key' => 'site_name'], ['value' => 'PortalNews']);
        \App\Models\Setting::firstOrCreate(['key' => 'footer_text'], ['value' => 'Portal News']);
        \App\Models\Setting::firstOrCreate(['key' => 'site_description'], ['value' => 'Portal berita terkini.']);
    }
}
