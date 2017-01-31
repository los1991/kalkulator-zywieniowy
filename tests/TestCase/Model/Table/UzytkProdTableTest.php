<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UzytkProdTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UzytkProdTable Test Case
 */
class UzytkProdTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UzytkProdTable
     */
    public $UzytkProd;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.uzytk_prod'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UzytkProd') ? [] : ['className' => 'App\Model\Table\UzytkProdTable'];
        $this->UzytkProd = TableRegistry::get('UzytkProd', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UzytkProd);

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
