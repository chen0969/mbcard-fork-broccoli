<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";

    protected $fillable = ['uid', 'bg_color', 'video', 'voice', 'facebook', 'instagram', 'linkedin', 'line'];

    public function member()
    {
        return $this->belongsTo('App\Member', 'uid', 'id');
    }
}
