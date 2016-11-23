<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JurnalModel extends Model
{
  protected $table = 'jurnal';
  protected $fillable ['tanggal','judul','deskripsi','pic','kehadiran'];
  protected $primaryKey = 'jurnal_id';
  public $timestamps = FALSE;
}
