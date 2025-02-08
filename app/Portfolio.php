<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = "portfolios";

    protected $fillable = ['uid', 'bg_color', 'video', 'voice', 'facebook', 'instagram', 'linkedin', 'line'];

    public function member()
    {
        return $this->belongsTo('App\Member', 'uid', 'id');
    }
}
