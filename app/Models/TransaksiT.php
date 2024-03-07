<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiT extends Model
{
    use HasFactory;
    protected $table = 'transaksi_tagihan';
    protected $guarded = '';

    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function pengajuan(){
        return $this->belongsTo(Pengajuan::class, 'id_pengajuan');
    }
}
