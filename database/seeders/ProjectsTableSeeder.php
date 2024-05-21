<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Functions\Helper;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $new_project = new Project();
            $new_project->title = $faker->words(3, true);
            $new_project->slug = Helper::createSlug($new_project->title, new Project());
            $new_project->type = $faker->word();
            $new_project->description = $faker->paragraph(2);
            $new_project->link = $faker->url();

            $new_project->save();
        }
    }
}
