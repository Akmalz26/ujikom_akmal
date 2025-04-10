<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'penjualan_id',
        'jumlah',
        'Jumlah_harga'

    ];

    public function produk()
	{
	      return $this->belongsTo('App\Models\Produk','produk_id', 'id');
	}

	public function penjualan()
	{
	      return $this->belongsTo('App\Models\Penjualan','penjualan_id', 'id');
	}
}
