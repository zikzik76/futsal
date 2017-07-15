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
      $this->call(UsersSeeder::class);
      $this->call(FieldsSeeder::class);
      $this->call(JadwalsSeeder::class);
      $this->call(SetTimesSeeder::class);
      $this->call(HargasSeeder::class);
      $this->call(AddDummyEvent::class);

        //$this->call(UsersTableSeeder::class);
    }
}
