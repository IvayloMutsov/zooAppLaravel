<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $fillable = ['name', 'type_id'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
