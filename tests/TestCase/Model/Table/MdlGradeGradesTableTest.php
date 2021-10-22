<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlGradeGradesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlGradeGradesTable Test Case
 */
class MdlGradeGradesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlGradeGradesTable
     */
    public $MdlGradeGrades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlGradeGrades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlGradeGrades') ? [] : ['className' => MdlGradeGradesTable::class];
        $this->MdlGradeGrades = TableRegistry::getTableLocator()->get('MdlGradeGrades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlGradeGrades);

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
