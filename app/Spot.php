<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $table = 'spots';
    protected $fillable = ['name', 'location', 'region', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
