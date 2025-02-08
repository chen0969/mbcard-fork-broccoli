<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'name', 'account', 'password', 'mobile', 'email',
        'avatar', 'banner', 'birth_day', 'address', 'description', 'status'
    ];

    public function portfolio()
    {
        return $this->hasOne('App\Portfolio', 'uid', 'id');
    }

    public function companies()
    {
        return $this->hasMany('App\Company', 'uid', 'id');
    }
}
