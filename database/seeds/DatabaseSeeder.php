<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Activisme_BE
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class); //! Also covers roles and permissions.
    }
}
