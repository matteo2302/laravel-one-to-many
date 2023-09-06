<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Project;
use Faker\Generator;
use Illuminate\Support\Arr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $types_ids = Type::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->title = Arr::random($types_ids);
            $project->type_id = 1;
            $project->date = $faker->dateTime();
            $project->last_update = $faker->dateTime();
            $project->description = implode(' ', $faker->paragraphs());
            $project->image = $faker->image(null, 640, 480);
            $project->save();
        }
    }
}
