<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bobot_alternatif extends Model
{
    protected $table = "bobot_alternatif";
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
    public function kriteria()
    {
        return $this->hasOne('App\kriteria', 'id', 'id_kriteria');
    }
    public function alternatif()
    {
        return $this->hasOne('App\alternatif', 'id', 'id_alternatif');
    }
}
