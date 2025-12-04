<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
