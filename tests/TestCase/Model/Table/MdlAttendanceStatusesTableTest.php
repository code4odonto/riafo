<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlAttendanceStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlAttendanceStatusesTable Test Case
 */
class MdlAttendanceStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlAttendanceStatusesTable
     */
    public $MdlAttendanceStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlAttendanceStatuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlAttendanceStatuses') ? [] : ['className' => MdlAttendanceStatusesTable::class];
        $this->MdlAttendanceStatuses = TableRegistry::getTableLocator()->get('MdlAttendanceStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlAttendanceStatuses);

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
