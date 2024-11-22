<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Roles')->insert([
            [
                'roles_name'=>'Admin',
                'roles_code'=>'TE1'
            ],
            [
                'roles_name'=>'MOD',
                'roles_code'=>'TE2'
            ],
            [
                'roles_name'=>'EDT',
                'roles_code'=>'TE3'
            ],
            [
                'roles_name'=>'VWR',
                'roles_code'=>'TE4'
            ],
            ]);
    }
}
