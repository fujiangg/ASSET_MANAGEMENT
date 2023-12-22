<?php

namespace Database\Seeders;

use App\Models\SettingTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DashboardIdentitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        SettingTitle::create([
            'dashboard_name'=>'TEMPLATE', 
        ]);
    }
}
