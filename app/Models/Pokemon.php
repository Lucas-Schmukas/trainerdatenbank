<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\WebScrapper;

class Pokemon extends Model
{
    use HasFactory;

    public function types()
    {
        return $this->belongsToMany(Typ::class, 'gehoertAn');
    }
    public function getSkillFromApi(WebScrapper $scrapper) : void
    {
        $this->faehigkeit = $scrapper->getSkillById($this->pokemonid);
        $this->feahigkeit->save();
    }

}
