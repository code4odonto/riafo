<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlGroupsMembersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlGroupsMembersTable Test Case
 */
class MdlGroupsMembersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlGroupsMembersTable
     */
    public $MdlGroupsMembers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlGroupsMembers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlGroupsMembers') ? [] : ['className' => MdlGroupsMembersTable::class];
        $this->MdlGroupsMembers = TableRegistry::getTableLocator()->get('MdlGroupsMembers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlGroupsMembers);

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
