<?php

namespace App\Models;
use App\Models\User;
use App\Models\Kategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiS extends Model
{
    use HasFactory;
    protected $table = 'transaksi_simpanan';
    protected $guarded = [];

     public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

     public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
