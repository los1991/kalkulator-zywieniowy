<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KategorieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KategorieTable Test Case
 */
class KategorieTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KategorieTable
     */
    public $Kategorie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.kategorie'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Kategorie') ? [] : ['className' => 'App\Model\Table\KategorieTable'];
        $this->Kategorie = TableRegistry::get('Kategorie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Kategorie);

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
