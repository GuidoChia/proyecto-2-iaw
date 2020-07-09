<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,3 )->create();
        $user = new User;
        $user->name='admin';
        $user->password=Hash::make('12345678');
        $user->email='admin@admin.com';
        $user->type='admin';
        $user->save();
    }
}
