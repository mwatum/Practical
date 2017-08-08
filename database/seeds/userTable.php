<?php

use Illuminate\Database\Seeder;
use App\User;
class userTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
        	'name'=>'kitumbo',
        	'email'=>'kitumbo@gmail.com',
        	'password'=>bcrypt('tumbotumbo')
        	]);
    }
}
