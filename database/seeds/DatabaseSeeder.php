<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(userTable::class);
    	$this->command->info('tumbo tumbo has created successfull in the seeder');
    }
}
