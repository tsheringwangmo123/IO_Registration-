<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Tshering wangmo',
            'email' => 'tsheringwangmo@gmail.com',
            'password' => bcrypt('12345678'),
            'gender' => 'female',
            'course'=> 'Bsc.CS',
            'year' => '3',
            'section' => 'Null'
        ]);
    //    $user->assignRole('System admin');
    }
}
