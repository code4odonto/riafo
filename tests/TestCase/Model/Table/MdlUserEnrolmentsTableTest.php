<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlUserEnrolmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlUserEnrolmentsTable Test Case
 */
class MdlUserEnrolmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlUserEnrolmentsTable
     */
    public $MdlUserEnrolments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlUserEnrolments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlUserEnrolments') ? [] : ['className' => MdlUserEnrolmentsTable::class];
        $this->MdlUserEnrolments = TableRegistry::getTableLocator()->get('MdlUserEnrolments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlUserEnrolments);

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
