<?php

use App\Repositories\PermissionsRepository;
use App\Repositories\RolesRepository;
use App\Repositories\UsersRepository;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

/**
 * Class UsersTableSeeder
 * ----
 * Create dummy users in the application. This class also covers roles and permissions. 
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   Activisme_BE
 */
class UsersTableSeeder extends Seeder
{
    private $permissions;   /** @var PermissionsRepository  $permissions */
    private $roles;         /** @var RolesRepository        $roles  */
    private $users;         /** @var UsersRepository        $users */

    /**
     * UsersTableSeeder constructor.
     *
     * @param  PermissionsRepository $permissions   Abstraction layer for the MySQL permissions table
     * @param  RolesRepository       $roles         Abstraction layer for the MySQL roles table
     * @param  UsersRepository       $users         Abstraction layer for the MySQL users table
     * @return void
     */
    public function __construct(PermissionsRepository $permissions, RolesRepository $roles, UsersRepository $users)
    {
        $this->permissions = $permissions;
        $this->roles       = $roles;
        $this->users       = $users;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->createPermissions();

        // Confirm roles needed
        if ($this->command->confirm('Create roles for user, default is admin and user?', true)) {
            // Ask roles from input
            $inputRoles = $this->command->ask('Enter roles in comma seperated format.', 'admin,user');
            $rolesArray = explode(',', $inputRoles); // BOOM! explode roles

            foreach ($rolesArray as $role) { // Foreach loop for adding roles in the application.
                $roleEntity = $this->roles->entity();
                $role       = $this->roles->firstOrCreate(['name' => trim($role)]);
                
                if ($this->roleIsAdmin($role))  {
                    $roleEntity->syncPermissions($this->permissions->all());
                    $this->command->info('Admin granted all permissions');
                } else { // For others by default only read access allowed
                    $roleEntity->syncPermissions($this->permissions->getReadPermissions());
                }

                // Create the dummy user in the application.
                $this->users->seedCreateUser($role, $this->command);
            }
        } else {
            $this->roles->firstOrCreate(['name' => 'user']);
            $this->command->info('Added only default user role');
        }
    }

    /**
     * Create the default permissions for the application.
     *
     * @return void
     */
    private function createPermissions(): void
    {
        $perms       = []; // In a later stage we need to fill in the default permissions.

        foreach ($perms as $perm) {
            $this->permissions->firstOrCreate(['name' => $perm]);
        }

        $this->command->info('Default permissions added');
    }

    /**
     * Determine is the create role is admin or not.
     *
     * @param  Role $role The database entity from the newly created ACL role
     * @return bool
     */
    private function roleIsAdmin(Role $role): bool
    {
        return $role->name === 'admin';
    }
}
