<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Home::count() === 0) {
            Home::create([
                'websiteimage' => 'Website_Image.png',
                'websitelogo' => 'Website_Logo.png',
                'greetingsword' => 'Welcome to our!',
                'websitedescription' => 'ProKing (Project Taking) merupakan sebuah website yang dibuat khusus untuk mengelola beberapa proyek yang telah dibuat. Dengan ProKing, Anda akan lebih mudah dalam menampilkan serta mengelola proyek.',
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('Home table is not empty. Skipping seeding');
        }
        // Add more data if needed
    }
}
