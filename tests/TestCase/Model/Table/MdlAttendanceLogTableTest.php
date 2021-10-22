<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlAttendanceLogTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlAttendanceLogTable Test Case
 */
class MdlAttendanceLogTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlAttendanceLogTable
     */
    public $MdlAttendanceLog;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlAttendanceLog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlAttendanceLog') ? [] : ['className' => MdlAttendanceLogTable::class];
        $this->MdlAttendanceLog = TableRegistry::getTableLocator()->get('MdlAttendanceLog', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlAttendanceLog);

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
