<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'aaa',
                'email' => 'por.za1713@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$tKiQdjzCKXzavNkRXf7GY.UkMpRLIFaSueabrNhCyR7k8i7g58YhG',
                'remember_token' => NULL,
                'created_at' => '2023-07-13 10:09:21',
                'updated_at' => '2023-07-13 10:09:21',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Naluephan',
                'email' => 'naluephan@co.th',
                'email_verified_at' => NULL,
                'password' => '$2y$10$oPL8YKtsUyMNoDHPvA1lw.GSW8fAjZSCuodJ.s7COaHjUs/9tc.Y6',
                'remember_token' => NULL,
                'created_at' => '2023-07-14 02:47:10',
                'updated_at' => '2023-07-14 02:47:10',
            ),
        ));
        
        
    }
}