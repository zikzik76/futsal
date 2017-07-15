<?php

use Illuminate\Database\Seeder;
use App\SetTime;

class SetTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $set_times1= SetTime::create([
        'time_group'=>'1',
        'jam_awal'=>'08:00',
        'jam_akhir'=>'12:00'
      ]);

      $set_times2= SetTime::create([
        'time_group'=>'2',
        'jam_awal'=>'13:00',
        'jam_akhir'=>'17:00'
      ]);

      $set_times3= SetTime::create([
        'time_group'=>'3',
        'jam_awal'=>'18:00',
        'jam_akhir'=>'23:00'
      ]);
    }
}
