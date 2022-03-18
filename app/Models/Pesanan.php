<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'Pesanan';
    protected $fillable = ['pesanan','total_harga','crn','nama_pemesan','id_petugas'];
}
