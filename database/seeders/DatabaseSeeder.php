<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            VaccineSeeder::class,
        ]);
        User::factory(1)->admin()->create();
        User::factory(1)->user()->create();
        User::factory(10)->create();
    }
}
