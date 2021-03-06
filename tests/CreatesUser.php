<?php 

namespace Tests;

use Spatie\Permission\Models\Role;
use App\User;

/**
 * Helper trait for creating dummy users while testing. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Tests
 */
trait CreatesUser 
{
    /**
     * Function for creating a newly role in the testing database.
     * 
     * @param  string $name The name for the role that needs to be created.
     * @return string
     */
    protected function createRole(string $name): string 
    {
        return factory(Role::class)->create(['name' => $name])->name;
    }

    /**
     * Create an normal user in the testing database. 
     * 
     * @param  string $role The name from the permission role. 
     * @return User
     */
    public function createUser(string $role): User 
    {
        return factory(User::class)->create()->assignRole($this->createRole($role));
    }
}