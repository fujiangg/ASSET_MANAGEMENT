<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            $this->call([
                AboutUsDescriptionSeeder::class,
                AboutUsTeamSeeder::class,
                ContactUsCard1Seeder::class,
                ContactUsCard2Seeder::class,
                FooterSeeder::class,
                HomeSeeder::class,
                MessageSeeder::class,
                NavbarSeeder::class,
                OurProjectSeeder::class,
                PortalLoginSeeder::class,
                ProjectManagementSeeder::class,
                UserSeeder::class
            ]);
    }

}
