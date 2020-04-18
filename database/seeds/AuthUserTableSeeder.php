<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AuthUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => config('farmersfriend.auth.name'),
            'email' => config('farmersfriend.auth.email'),
            'password' => bcrypt(config('farmersfriend.auth.password')),
            'email_verified_at' => Carbon::now()
        ];


        User::insert($user);

    }
}
