<?php

namespace App\Models;
use App\Models\Kategori;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $table ='jenis';
    protected $guarded =[];

    public function kategori() {
        return $this->hasMany(Kategori::class, 'id');
    }
}
