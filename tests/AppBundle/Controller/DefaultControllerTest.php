<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->followRedirects(true);

        $crawler = $client->request('GET', '/login');
        var_dump($client->getResponse()->getContent());

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('utilisateur', $crawler->filter('.btn-primary')->text());
    }
}
