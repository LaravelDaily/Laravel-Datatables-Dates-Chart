<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$7AIp4Vscy/KhQCG1ZpPOn.J7ECARFd3DSXaVCCpb9dQE3BpS1Am.S',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
