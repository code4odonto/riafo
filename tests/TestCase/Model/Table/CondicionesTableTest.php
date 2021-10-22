<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CondicionesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CondicionesTable Test Case
 */
class CondicionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CondicionesTable
     */
    public $Condiciones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Condiciones',
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
        $config = TableRegistry::getTableLocator()->exists('Condiciones') ? [] : ['className' => CondicionesTable::class];
        $this->Condiciones = TableRegistry::getTableLocator()->get('Condiciones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Condiciones);

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
