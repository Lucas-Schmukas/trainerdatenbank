<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Scalar\String_;

/**
 * @method static where(string $string, int $id)
 */
class Pokedex extends Model
{
    use HasFactory;

    public function index() : Collection
    {
        return Pokedex::all();
    }

    static public function getNameById(int $id) : String
    {
        return Pokedex::where('id', $id)
            ->first()
            ->name;
    }

    static public function getTypeBySpezies(String $spezies) : array
    {
        $id = self::getIdBySpezies($spezies);
        return self::getPokemonTypeById($id);
    }
    static public function getIdBySpezies(String $spezies) : String
    {
        return Pokedex::where('name', $spezies)
            ->first()
            ->id;
    }
    static public function getPokemonTypeById(int $id) : array
    {
        $types = Pokedex::where('id', $id)->first()->type;
        return self::splitType($types);
    }
    private function splitType(String $typ) : array
    {
        return explode(' ', $typ);
    }

    private function cleanType(String $type) : String
    {
        return substr($type, 0, strpos($type, "["));
    }

}
