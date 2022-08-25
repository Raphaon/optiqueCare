<?php

namespace App\Test\Controller;

use App\Entity\OcExamens;
use App\Repository\OcExamensRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OcExamensControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private OcExamensRepository $repository;
    private string $path = '/oc/examens/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(OcExamens::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('OcExamen index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'oc_examen[refExamen]' => 'Testing',
            'oc_examen[designation]' => 'Testing',
            'oc_examen[codeExamen]' => 'Testing',
            'oc_examen[prixExamen]' => 'Testing',
        ]);

        self::assertResponseRedirects('/oc/examens/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new OcExamens();
        $fixture->setRefExamen('My Title');
        $fixture->setDesignation('My Title');
        $fixture->setCodeExamen('My Title');
        $fixture->setPrixExamen('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('OcExamen');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new OcExamens();
        $fixture->setRefExamen('My Title');
        $fixture->setDesignation('My Title');
        $fixture->setCodeExamen('My Title');
        $fixture->setPrixExamen('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'oc_examen[refExamen]' => 'Something New',
            'oc_examen[designation]' => 'Something New',
            'oc_examen[codeExamen]' => 'Something New',
            'oc_examen[prixExamen]' => 'Something New',
        ]);

        self::assertResponseRedirects('/oc/examens/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getRefExamen());
        self::assertSame('Something New', $fixture[0]->getDesignation());
        self::assertSame('Something New', $fixture[0]->getCodeExamen());
        self::assertSame('Something New', $fixture[0]->getPrixExamen());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new OcExamens();
        $fixture->setRefExamen('My Title');
        $fixture->setDesignation('My Title');
        $fixture->setCodeExamen('My Title');
        $fixture->setPrixExamen('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/oc/examens/');
    }
}
