<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
  protected $table = 'siswa';
  protected $fillable = ['siswa_nama','siswa_ortu'];
  protected $primaryKey = 'siswa_id';
  public $timestamps = FALSE;
}
