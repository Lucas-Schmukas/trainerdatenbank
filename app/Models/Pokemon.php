<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $primaryKey = 'pokemonid';

    protected $fillable = ['spezies'];

    protected $table = 'pokemon';

    public $timestamps = false;

    public function types()
    {
        return $this->belongsToMany(Typ::class, 'gehoertAn');
    }

}
