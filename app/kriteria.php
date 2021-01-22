<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    protected $table = "kriteria";
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    public function sub_kriteria()
    {
        return $this->hasOne('App\kriteria', 'id', 'id_kriteria_sub');
    }
}
