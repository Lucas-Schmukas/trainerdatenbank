<?php

namespace App\Models;


use App\Services\WebScrapper;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Scalar\String_;

/**
 * @method static where(string $string, int $id)
 */
class Pokedex extends Model
{
    use HasFactory;

    protected $table = 'pokedex';

    protected $fillable = ['faehigkeit'];

    public $timestamps = false;

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
    static public function getSkillById(int $id) : String
    {
        $pokemon = Pokedex::where('id', $id)
            ->first();
        return $pokemon->faehigkeit;
    }

    static public function getSkillByName(String $name) : String
    {
        $pokemon = DB::table('pokedex')
            ->where('name', $name )
            ->first();
        if($pokemon->faehigkeit === null){
            $scrapper = new WebScrapper();
            $pokemon->faehigkeit = $scrapper->getSkillById($pokemon->pokemonid);
            $pokemon->save();
        }
        return $pokemon->faehigkeit;
    }

    static public function getTypesBySpezies(String $spezies) : array
    {
        $spezies = trim($spezies);
        $pokemon = Pokedex::where('name','like', '%' . $spezies . '%')
            ->first();
        $pokemon->name = trim($spezies);
        $pokemon->save();
        $types = $pokemon->typ;
        return self::splitType($types);
    }
    private static function splitType(String $typ) : array
    {
        return explode(' ', $typ);
    }

    public static function fillSkills()
    {
        $scrapper = new WebScrapper();
        foreach (Pokedex::all() as $pokemon) {
            $pokemon->faehigkeit = $scrapper->getSkillById($pokemon->pokemonid);
            $pokemon->save();
        }
    }
}
