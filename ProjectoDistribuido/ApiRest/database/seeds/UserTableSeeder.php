<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
          [
            'name' => 'Administrador',
            'email' => 'api@utem.cl',
            'password' => Hash::make('secret')
          ]
        ];

        foreach($users as $user){
          \App\User::create($user);
        }
        /*\DB::table('users')->truncate();

        $faker = Faker::create();
        User::create(['nombre'=>"admin",
                      'apellido'=>$faker->lastName,
                      'email'=>"api@utem.cl",
                      'password'=>\Hash::make('secret')]);
                      */
    }
}
