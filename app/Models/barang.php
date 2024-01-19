<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['kode', 'nama_barang', 'jumlah', 'suplier'];
    protected $table = 'barang';
    public $timestamps = false;
}
