<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
    use HasFactory;

    public function index() : Collection
    {
        return Typ::all();
    }

    static public function getTypeIdByDescription(String $typeDescription) : int
    {
       $type = Typ::where('bezeichnung', $typeDescription)
           ->first();
        return $type->id;
    }
    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class, 'gehoertAn');
    }
}
