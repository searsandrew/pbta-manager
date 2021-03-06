<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apocalypse extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = ['slug', 'name', 'stats', 'defaults'];

    /**
     * Set the route key name to slug
     * 
     * @return string
     */
    public function getRouteKeyName() : string
    {
        return 'slug';
    }

    public function types()
    {
        return $this->hasMany(Type::class);
    }
}
