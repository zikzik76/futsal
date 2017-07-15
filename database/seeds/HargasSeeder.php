<?php

use Illuminate\Database\Seeder;
use App\Harga;

class HargasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $harga1= Harga::create([
        'time_group'=>'1',
        'status_pelanggan'=>'member',
        'id_lapangan'=>'1',
        'harga_sewa'=>'80000'
      ]);
      $harga2= Harga::create([
        'time_group'=>'1',
        'status_pelanggan'=>'member',
        'id_lapangan'=>'2',
        'harga_sewa'=>'85000'
      ]);

      $harga3= Harga::create([
          'time_group'=>'2',
          'status_pelanggan'=>'member',
          'id_lapangan'=>'1',
          'harga_sewa'=>'100000'
        ]);

        $harga4= Harga::create([
            'time_group'=>'2',
            'status_pelanggan'=>'member',
            'id_lapangan'=>'2',
            'harga_sewa'=>'120000'
          ]);

          $harga5= Harga::create([
              'time_group'=>'3',
              'status_pelanggan'=>'member',
              'id_lapangan'=>'1',
              'harga_sewa'=>'150000'
            ]);

              $harga6= Harga::create([
                'time_group'=>'3',
                'status_pelanggan'=>'member',
                'id_lapangan'=>'2',
                'harga_sewa'=>'180000'
              ]);

               $harga7= Harga::create([
                  'time_group'=>'1',
                  'status_pelanggan'=>'non-member',
                  'id_lapangan'=>'1',
                  'harga_sewa'=>'85000'
                ]);
                $harga1= Harga::create([
                   'time_group'=>'1',
                   'status_pelanggan'=>'non-member',
                   'id_lapangan'=>'2',
                   'harga_sewa'=>'90000'
                 ]);
                 $harga1= Harga::create([
                    'time_group'=>'2',
                    'status_pelanggan'=>'non-member',
                    'id_lapangan'=>'1',
                    'harga_sewa'=>'120000'
                  ]);
                  $harga1= Harga::create([
                     'time_group'=>'2',
                     'status_pelanggan'=>'non-member',
                     'id_lapangan'=>'2',
                     'harga_sewa'=>'150000'
                   ]);
    }
}
