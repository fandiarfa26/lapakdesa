<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function usaha()
    {
        return $this->belongsTo('App\Usaha', 'usaha_id');
    }

    public function produk()
    {
        return $this->belongsTo('App\Produk', 'produk_id');
    }
}
