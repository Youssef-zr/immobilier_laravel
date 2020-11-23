<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 2;

        User::create([
            'name' => 'admin',
            'email' => "admin@admin.com",
            'password' => bcrypt("princehd12345"),
            'image' => 'users/' . $i . '.jpg',
            "is_admin" => 1,
        ]);

        while ($i <= 40) {
            $users = ['youssef', 'mohammed', 'houssam', 'chrif', 'anas', 'ali', 'haitem'];
            $rand = array_rand($users);
            User::create([
                'name' => $users[$rand],
                'email' => "email" . $i . '@gmail.com',
                'password' => bcrypt(123456),
                'image' => 'users/' . $i . '.jpg',
                "is_admin" => random_int(0, 1),
            ]);

            $i++;
        }
    }
}
