<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlAttendanceTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlAttendanceTable Test Case
 */
class MdlAttendanceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlAttendanceTable
     */
    public $MdlAttendance;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlAttendance'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlAttendance') ? [] : ['className' => MdlAttendanceTable::class];
        $this->MdlAttendance = TableRegistry::getTableLocator()->get('MdlAttendance', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlAttendance);

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
