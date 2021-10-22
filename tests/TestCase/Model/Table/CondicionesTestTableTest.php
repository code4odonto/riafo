<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CondicionesTestTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CondicionesTestTable Test Case
 */
class CondicionesTestTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CondicionesTestTable
     */
    public $CondicionesTest;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CondicionesTest',
        'app.Users',
        'app.Materias',
        'app.Comisions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CondicionesTest') ? [] : ['className' => CondicionesTestTable::class];
        $this->CondicionesTest = TableRegistry::getTableLocator()->get('CondicionesTest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CondicionesTest);

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

    /**
     * Test defaultConnectionName method
     *
     * @return void
     */
    public function testDefaultConnectionName()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
