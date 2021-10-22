<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlGradeItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlGradeItemsTable Test Case
 */
class MdlGradeItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlGradeItemsTable
     */
    public $MdlGradeItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlGradeItems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlGradeItems') ? [] : ['className' => MdlGradeItemsTable::class];
        $this->MdlGradeItems = TableRegistry::getTableLocator()->get('MdlGradeItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlGradeItems);

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
