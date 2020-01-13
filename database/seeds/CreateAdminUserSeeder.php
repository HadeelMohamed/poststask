<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Blog;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Hadeel',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'email_verified_at' =>'2020-01-08 00:00:00.000000'
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'post-comment'
        ];

        $role->syncPermissions($permissions);




        $user->assignRole([$role->id]);
        $blog= Blog::create(['user_id' =>  $user->id]);
    }
}
