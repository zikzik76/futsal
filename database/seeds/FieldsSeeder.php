<?php

use Illuminate\Database\Seeder;
use App\Field;

class FieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //sample lapangan
        $field1= Field::create([
          'id_lapangan'=>'1',
          'nama_lapangan'=>'A-1',
          'harga_sewa'=>'100000',
          'gambar'=>'asal.jpg'
        ]);
        $field2= Field::create([
          'id_lapangan'=>'2',
          'nama_lapangan'=>'A-2',
          'harga_sewa'=>'120000',
          'gambar'=>'asli.jpg'
        ]);

    }
}
