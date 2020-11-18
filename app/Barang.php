<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barang';
    protected $fillable = ['ID_Barang','Nama','timestamp'];
    public $timestamps = false;
}