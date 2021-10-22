<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlAttendanceSessionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlAttendanceSessionsTable Test Case
 */
class MdlAttendanceSessionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlAttendanceSessionsTable
     */
    public $MdlAttendanceSessions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlAttendanceSessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlAttendanceSessions') ? [] : ['className' => MdlAttendanceSessionsTable::class];
        $this->MdlAttendanceSessions = TableRegistry::getTableLocator()->get('MdlAttendanceSessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlAttendanceSessions);

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
