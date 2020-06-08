<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FrontControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        //$message = $crawler->filterXPath('//body/h4')->text();

        //var_dump($message);die;

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        //$this->assertContains('Planning', $crawler->filter('body > h4')->text());
//        $this->assertContains('Réserver', $crawler->filter('h4')->text());
//        $this->assertContains('Mes réservations', $crawler->filter('#container h4')->text());
//        $this->assertContains('Consulter Météo actuelle', $crawler->filter('#container h4')->text());


    }
}
