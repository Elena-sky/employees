<?php

use Illuminate\Database\Seeder;
use App\Employees as Employees;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Level 1
        factory(Employees::class)->create(['parent_id' =>0,'position' =>'BOSS']);

        // Level 2
        factory(Employees::class,30)->create(['parent_id' =>1]);

        // Level 3
        factory(Employees::class,300)->create(['parent_id' =>5]);
        factory(Employees::class,300)->create(['parent_id' =>8]);
        factory(Employees::class,300)->create(['parent_id' =>12]);
        factory(Employees::class,300)->create(['parent_id' =>19]);

        // Level 4
        factory(Employees::class,300)->create(['parent_id' =>1953]);
        factory(Employees::class,300)->create(['parent_id' =>2400]);
        factory(Employees::class,300)->create(['parent_id' =>2276]);
        factory(Employees::class,300)->create(['parent_id' =>2598]);
        factory(Employees::class,300)->create(['parent_id' =>2185]);

        // Level 5
        factory(Employees::class,48000)->create();
    }
}
