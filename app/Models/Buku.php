<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    public $timestamps = false;


    public function kategori() {
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
   
    public function penerbit() {
        return $this->belongsTo(Penerbit::class,'penerbit_id','id');
    }
}
