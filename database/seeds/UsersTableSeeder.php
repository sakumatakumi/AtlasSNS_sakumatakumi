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
                'password' => bcrypt('ippo')
            ],
            [
                'username' => '鷹村守',
                'mail' => 'tamkamuramamoru@mail',
                'password' => bcrypt('takamura')
            ],
            [
                'username' => '宮田一郎',
                'mail' => 'miyataitirou@mail',
                'password' => bcrypt('miyata')
            ],
        ]);
    }
}
