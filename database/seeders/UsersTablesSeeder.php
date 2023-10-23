<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Str;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       User::create([

        'name'=>'autoMobile',
        'email'=>'123@gmail.com',
        'password'=>Hash::make('1234@5678'),
       



       ]);


    }
}
