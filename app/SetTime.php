<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetTime extends Model
{
  protected $primaryKey = 'time_group';
  protected $fillable = ['time_group','jam_awal','jam_akhir'];

}
