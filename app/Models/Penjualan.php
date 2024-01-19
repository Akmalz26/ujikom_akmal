<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'total_harga',
        'pelanggan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'pelanggan_id');
    }
}
