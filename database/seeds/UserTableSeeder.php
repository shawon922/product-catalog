<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'name' => 'Admin User',
			'role_id' => 1,
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin12345')
		]);

        User::create([
            'name' => 'Md Mahfuzur Rahman',
            'role_id' => 2,
            'email' => 'shawon922@gmail.com',
            'password' => bcrypt('123456')
        ]);

    }
}
