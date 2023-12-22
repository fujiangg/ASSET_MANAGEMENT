<?php

namespace Database\Seeders;

use App\Models\ProjectManagement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (ProjectManagement::count() === 0) {
            ProjectManagement::create([
                'project_id' => 'PROJ_' . date('YmdHis'),
                'projectname' => 'AMS P-1',
                'projectuser' => 'KOMINFO',
                'projectdeadline' => '2024-04-15'
            ]);
            $this->command->info('Successfully seeding.');
        } else {
            $this->command->info('ProjectManagement table is not empty. Skipping seeding');
        }
    }
}