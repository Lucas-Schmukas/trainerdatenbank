<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typ extends Model
{
    use HasFactory;

    protected $table = 'typ';

    public $timestamps = false;

    public function index() : Collection
    {
        return Typ::all();
    }

    static public function getTypeIdByDescription(String $typeDescription) : int
    {
       $typeId = Typ::where('bezeichnung', $typeDescription)
           ->first()
           ->typid;
        return $typeId;
    }
    public function pokemon()
    {
        return $this->belongsToMany(Pokemon::class, 'gehoertAn');
    }
}
