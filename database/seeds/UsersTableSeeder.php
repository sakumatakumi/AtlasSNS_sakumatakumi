<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'username' => '幕之内一歩',
                'mail' => 'makunoutiippo@mail',
                'password' => bcrypt('makunoutiippo')
            ],
            [
                'username' => '鷹村守',
                'mail' => 'takamuramamoru@mail',
                'password' => bcrypt('takamuramamoru')
            ],
            [
                'username' => '宮田一郎',
                'mail' => 'miyataitirou@mail',
                'password' => bcrypt('miyatamiyataitirou')
            ],
        ]);
    }
}
