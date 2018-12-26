<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'usaha';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function produk()
    {
        return $this->hasMany('App\Produk');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}
