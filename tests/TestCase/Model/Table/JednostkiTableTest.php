<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JednostkiTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JednostkiTable Test Case
 */
class JednostkiTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JednostkiTable
     */
    public $Jednostki;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jednostki'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Jednostki') ? [] : ['className' => 'App\Model\Table\JednostkiTable'];
        $this->Jednostki = TableRegistry::get('Jednostki', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jednostki);

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
