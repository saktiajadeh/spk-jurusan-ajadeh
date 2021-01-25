<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    protected $table = "alternatif";
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
