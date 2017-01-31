<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UzytkownikTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UzytkownikTable Test Case
 */
class UzytkownikTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UzytkownikTable
     */
    public $Uzytkownik;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.uzytkownik'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Uzytkownik') ? [] : ['className' => 'App\Model\Table\UzytkownikTable'];
        $this->Uzytkownik = TableRegistry::get('Uzytkownik', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Uzytkownik);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
