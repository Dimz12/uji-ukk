<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
         [
            'username' => 'admin1 ',
            'name'=>'ini adalah admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
<<<<<<< HEAD
            'password' => bcrypt('admin123'),
=======
            'password' => bcrypt('admin'),
>>>>>>> 20041fe9a6e2be21ab0a289f91e6722800865227
        ],

        [
            'username' => 'user',
            'name'=>'ini adalah editor',
            'email' => 'editor@gmail.com',
            'level' => 'editor',
            'password' => bcrypt('user123'),
        ]
                        
        ];

        foreach ($user as $key => $value){
          User::create($value);
        }
    }
}
