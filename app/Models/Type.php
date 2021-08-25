<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['slug', 'name', 'flavor', 'type', 'rules', 'attacks', 'gear', 'moves', 'special', 'luck', 'history', 'looks', 'ratings', 'improvements'];

    /**
     * Set the route key name to slug
     * 
     * @return string
     */
    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function apocalypse()
    {
        return $this->belongsTo(Apocalypse::class);
    }
}
