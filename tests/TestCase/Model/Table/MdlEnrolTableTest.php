<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlEnrolTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlEnrolTable Test Case
 */
class MdlEnrolTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlEnrolTable
     */
    public $MdlEnrol;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlEnrol'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlEnrol') ? [] : ['className' => MdlEnrolTable::class];
        $this->MdlEnrol = TableRegistry::getTableLocator()->get('MdlEnrol', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlEnrol);

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
