<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tanggal',
        'status',
        'kode',
        'Jumlah_harga'

    ];

    protected $with = ['user'];

    public function user()
	{
	      return $this->belongsTo('App\Models\User','user_id', 'id');
	}

	public function detail_penjualan() 
	{
	     return $this->hasMany('App\Models\DetailPenjualan','penjualan_id', 'id');
	}
}
