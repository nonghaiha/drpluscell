<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserSeeder');
    }
    
}
class UserSeeder extends Seeder
{
    public function run()
    {
        //Create Auth
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Administrator'
            ],
            [
                'name' => 'user',
                'display_name' => 'Normal User',
                'description' => 'Normal User'
            ]
        ];

        $permissions = [
            [
                'name' => 'user',
                'display_name' => 'normal user',
                'description' => ''
            ]
        ];


        $users = [
            [
                'name' => 'Drpluscell Administrator',
                'email' => 'admin@drpluscell.com',
                'password' => bcrypt('00000000'),
                'is_admin' => 1
            ],
            [
                'name' => 'Normal User',
                'email' => 'normal@drpluscell.com',
                'password' => bcrypt('00000000'),
                'is_admin' => 0
            ]
        ];

        foreach ($roles as $k => $role) {
            $newRole = Role::create($role);

            if (array_key_exists($k, $permissions)) {
                $newPermission = Permission::create($permissions[$k]);
                $newRole->attachPermission($newPermission);
            }

            if (array_key_exists($k, $users)) {
                $newUser = User::create($users[$k]);
                $newUser->attachRole($newRole);
            }

            if ($role['name'] == 'admin') {
                $newUser = User::create([
                    'name' => 'CMS Administrator',
                    'email' => 'nonghaiha@caerux.com',
                    'password' => bcrypt('00000000'),
                    'is_admin' => 1
                ]);
                $newUser->attachRole($newRole);
            }
        }

    }
}

