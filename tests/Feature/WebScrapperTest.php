<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\WebScrapper;

class WebScrapperTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetSkillById()
    {
        $scrapper = new WebScrapper();
        $skill = $scrapper->getSkillById(4);
        $this->assertEquals('Solarkraft',$skill);
    }
}
