<?php

use Illuminate\Database\Seeder;
use App\Jadwal;
use App\Field;
use App\Sewa;
class JadwalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sample jadwals
        $jadwal1 = Jadwal::create([
        'tanggal'=>'2017-03-04',
        'petugas'=>'admin',
        'id_lapangan'=>'1',
        'id_sewa'=>'1',
        'jam'=>'06:54:17'
      ]);

      $jadwal2 = Jadwal::create([
      'tanggal'=>'2017-03-04',
      'petugas'=>'admin',
      'id_lapangan'=>'1',
      'id_sewa'=>'1',
      'jam'=>'06:54:17'
    ]);
    }
}
