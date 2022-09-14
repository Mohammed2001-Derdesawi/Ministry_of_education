<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\SchoolRatings;
use App\Models\Specialization;
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
        $dbseed=config('dbseed');
        foreach($dbseed['directions'] as $direction)
        {
            Direction::create([
                'direction'=>$direction
            ]);
        }
        foreach($dbseed['school_ratings'] as $school_rating)
        {
            SchoolRatings::create([
                'name'=>$school_rating
            ]);
        }
        foreach($dbseed['specializations'] as $specialization)
        {
            Specialization::create([
                'specialization'=>$specialization
            ]);
        }

    }
}
