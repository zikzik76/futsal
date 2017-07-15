<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
  protected $fillable = ['time_group','status_pelanggan','id_lapangan','harga_sewa'];

}
