<?php

namespace App\Services;

use Goutte\Client;
use PhpParser\Node\Scalar\String_;

class WebScrapper
{
    private Client $client;

    const POKEMON_URL = "https://www.bisafans.de/pokedex/";

    public function __construct()
    {
        $this->client = new Client();
    }
    public function getSkillById(int $id) : String
    {
        $url = self::POKEMON_URL . $this->idWithZerosIfNeeded($id) . '.php';
        $crawler = $this->client->request('GET', $url);
        $node = $crawler->filter('html body#page-pokedex-_pokemon.isOther div#flexContent div#main.container div.row div#contentWrapper.col-md-9 div#content section.well div#pokedexEntry.panel-group div.panel.panel-default div#infos.panel-collapse.collapse.in.active div.panel-body div.row div.col-md-6 div.panel.panel-default div.panel-body dl.dl-horizontal dd ul.list-unstyled li a')->last();
        return $node->text();
    }
    private function idWithZerosIfNeeded(int $id)
    {   $stringId = strval($id);
        if(strlen($stringId) === 3) {
            return $stringId;
        }
        return str_repeat('0',(3- strlen($stringId))) . $id;
    }
}
