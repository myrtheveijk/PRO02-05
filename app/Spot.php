<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $table = 'spots';

    // Hier een nieuw veld toevoegen zodra het opgeslagen moet worden in de DB.
    protected $fillable = ['name', 'location', 'region', 'image', 'website', 'visible'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
