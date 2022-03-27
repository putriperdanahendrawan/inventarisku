<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class Barang extends Model
{
    use HasFactory;
    protected $visible = ['id','nama_barang','jumlah_stok'];

    protected $fillable = ['id','nama_barang','jumlah_stok'];

    public $timestamps = true;

    public function Barang()
    {
        return $this->nama_barang . " " . $this->merek;
    }

    public function barangmasuk()
    {
        // data model "Barang" bisa memiliki banyak data
        //dari model "Barangmasuk" melalui fk "author_id"
        $this->hasMany('App\Models\Barangmasuk','id_barang');
    }

    public function barangkeluar()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Barangkeluar','id_barang');
    }
    public function peminjam()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Peminjam','id_barang');
    }

    public function pengembalian()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Pengembalian','id_barang');
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::deleting(function ($barang) {
    //         if ($barang->barangmasuk->count() > 0) {
    //             Alert::error('Ups', 'Data tidak bisa dihapus');
    //             return false;
    //         }
    //     });
    // }
}
