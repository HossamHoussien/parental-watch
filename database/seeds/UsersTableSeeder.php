<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ParentUser::class, 1)->create();
        factory(App\Models\Nanny::class, 5)->create();
        factory(App\Models\Tutor::class, 5)->create();
    }
}