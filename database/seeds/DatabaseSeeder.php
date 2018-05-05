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
        // Ask for database migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear old data?')) {
            // Call the php artisan artisan migrate:refresh command
            $this->command->call('migrate:refresh');
            $this->command->warn('Data cleared, starting from blank database.');
        }

        // Execute all the seeders.
        $this->call(UsersTableSeeder::class); //! Also covers roles and permissions.
    }
}
