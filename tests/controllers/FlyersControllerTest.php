<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FlyersControllerTest extends TestCase
{
    public function testshowtheformtocreateflyer()
    {
        $this->visit('/flyers/create');
            
    }
}
