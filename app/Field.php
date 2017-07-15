<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $primaryKey = 'id_lapangan';
    protected $fillable = [
        'id_lapangan', 'nama_lapangan', 'harga_sewa', 'gambar',
    ];

    public function jadwals(){
      return $this->hasMany('App\Jadwal');
    }

}
