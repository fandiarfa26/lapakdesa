<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    public function usaha()
    {
        return $this->belongsTo('App\Usaha', 'usaha_id');
    }

    public function transaksi()
    {
        return $this->hasOne('App\Transaksi');
    }
}
