<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $visible = ['id_barang', 'jumlah', 'id_kategori', ];
    protected $fillale = ['id_barang', 'jumlah', 'id_kategori', ];
    public $timestamps= true;

    public function Ruangan()
    {
        // data dari Model "Book" bisa dimiliki oleh model "Author"
        // melalui fk "author_id"
        return $this->belongsTo('App\Models\Ruangan', 'id_ruangan');
    }
}

