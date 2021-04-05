<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

        $admin = Role::create(['name' => 'Admin']);
        $cashier = Role::create(['name' => 'Cashier']);
        $client = Role::create(['name' => 'Client']);

        $admin_user = User::create([
            'name' => 'Admin',
            'email' => 'admin@tgiperu.com',
            'password' => Hash::make('12345678'),
        ]);
        $admin_user->profile()->create();

        $admin_user->assignRole($admin);

        $cashier_user = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@tgiperu.com',
            'password' => Hash::make('12345678'),
        ]);
        $cashier_user->profile()->create();

        $cashier_user->assignRole($cashier);

        $client_user = User::create([
            'name' => 'Client',
            'email' => 'client@tgiperu.com',
            'password' => Hash::make('12345678'),
        ]);

        $client_user->profile()->create();

        $client_user->assignRole($client);

    }
}
