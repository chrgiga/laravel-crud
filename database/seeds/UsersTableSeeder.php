<?php

use Illuminate\Database\Seeder;
use  \App\Department;

class UsersTableSeeder extends Seeder
{
    protected $departmentNames = [
        'PHP developer' => 'IT',
        'Technical assistant' => 'Relationship',
        'Receptionist' => 'Administration',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create()->each(function ($user) {
            $department = Department::where('name', $this->departmentNames[$user->work_position])->firstOrFail();
            $department && $user->departments()->save($department);
        });
    }
}
