<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
  protected $table = 'kelas';
  protected $fillable ['kelas_nama'];
  protected $primaryKey = 'kelas_id';
  public $timestamps = FALSE;
}
