<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlCourseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlCourseTable Test Case
 */
class MdlCourseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlCourseTable
     */
    public $MdlCourse;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlCourse'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlCourse') ? [] : ['className' => MdlCourseTable::class];
        $this->MdlCourse = TableRegistry::getTableLocator()->get('MdlCourse', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlCourse);

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
