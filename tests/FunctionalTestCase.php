<?php

namespace Tests;

use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTestCase extends WebTestCase
{
    protected $client;
    protected $container;
    protected $entityManager;
    protected $schemaTool;

    public function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();
        $this->setContainer();
        $this->entityManager = $this->container->get('doctrine.orm.entity_manager');
        $this->schemaTool = $this->createSchemaTool();
    }

    protected function assertResponseOk()
    {
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    private function setContainer()
    {
        if (!isset($this->client)) {
            $this->client = static::createClient();
        }
        if (!isset($this->container)) {
            $this->container = static::$kernel->getContainer();
        }
    }

    private function createSchemaTool()
    {
        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->dropDatabase();
        $schemaTool->createSchema($this->entityManager->getMetadataFactory()->getAllMetadata());

        return $schemaTool;
    }
}
