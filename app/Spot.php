<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = ['name', 'location', 'region', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
