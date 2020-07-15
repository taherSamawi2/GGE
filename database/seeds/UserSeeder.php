<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = new User();
        $user->name = "GGE ADMIN";
        $user->email = "gge@admin.com";
        $user->password = Hash::make('admingge2020');
        $user->save();
    }
}
