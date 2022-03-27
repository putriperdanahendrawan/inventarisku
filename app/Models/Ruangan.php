<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $visible = ['nama_ruangan', 'slug'];
    protected $fillable = ['nama_ruangan', 'slug'];

    public $timestamps = true;

    public function barangruangans()
    {
        return $this->hasMany('App\Models\Barangruangan', 'id_ruangan');

    }

    function getRouteKeyName()
    {
        return 'slug';
    }
}
