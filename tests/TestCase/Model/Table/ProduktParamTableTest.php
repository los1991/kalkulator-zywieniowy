<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProduktParamTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProduktParamTable Test Case
 */
class ProduktParamTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProduktParamTable
     */
    public $ProduktParam;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.produkt_param'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProduktParam') ? [] : ['className' => 'App\Model\Table\ProduktParamTable'];
        $this->ProduktParam = TableRegistry::get('ProduktParam', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProduktParam);

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
