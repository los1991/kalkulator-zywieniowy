<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParametryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParametryTable Test Case
 */
class ParametryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ParametryTable
     */
    public $Parametry;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.parametry'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Parametry') ? [] : ['className' => 'App\Model\Table\ParametryTable'];
        $this->Parametry = TableRegistry::get('Parametry', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Parametry);

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
