<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

  protected $fillable = ['tanggal','petugas','id_lapangan','id_sewa','jam'];

    public function field()
    {
      return $this->belongsTo('App\Field');
    }
}
