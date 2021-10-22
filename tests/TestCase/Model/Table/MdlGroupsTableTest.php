<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlGroupsTable Test Case
 */
class MdlGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlGroupsTable
     */
    public $MdlGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlGroups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlGroups') ? [] : ['className' => MdlGroupsTable::class];
        $this->MdlGroups = TableRegistry::getTableLocator()->get('MdlGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlGroups);

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
