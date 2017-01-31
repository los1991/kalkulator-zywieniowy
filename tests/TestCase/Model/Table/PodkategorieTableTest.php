<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PodkategorieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PodkategorieTable Test Case
 */
class PodkategorieTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PodkategorieTable
     */
    public $Podkategorie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.podkategorie'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Podkategorie') ? [] : ['className' => 'App\Model\Table\PodkategorieTable'];
        $this->Podkategorie = TableRegistry::get('Podkategorie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Podkategorie);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
