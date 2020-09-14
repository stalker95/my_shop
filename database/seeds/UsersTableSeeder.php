<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $admin_role = Role::where('name', 'admin')->first();
        $author_role = Role::where('name', 'author')->first();
        $user_role = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'Admin User',
        	'email' => 'admin@admin.com',
        	'password' => hash::make('12dukanod')
        ]);
        $author = User::create([
        	'name' => 'Author User',
        	'email' => 'author@admin.com',
        	'password' => hash::make('12dukanod')
        ]);
        $user = User::create([
        	'name' => 'User User',
        	'email' => 'user@admin.com',
        	'password' => hash::make('12dukanod')
        ]);

        $admin->roles()->attach($admin_role);
        $author->roles()->attach($author_role);
        $user->roles()->attach($user_role);
    }
}
