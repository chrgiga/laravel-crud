<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'IT',
            'description' => 'Department for business and customers IT solutions.',
        ]);
        DB::table('departments')->insert([
            'name' => 'Relationship',
            'description' => 'Relationship department.',
        ]);
        DB::table('departments')->insert([
            'name' => 'Administration',
            'description' => 'Manage internal administration and services.',
        ]);
    }
}
