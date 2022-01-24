<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $root= new User(); //id-->1
        $root-> name ="Gerson mojica";
        $root-> email ="gersonpsj@gmail.com";
        $root-> password = bcrypt('1234567');
        $root->save();
      
    }
}
