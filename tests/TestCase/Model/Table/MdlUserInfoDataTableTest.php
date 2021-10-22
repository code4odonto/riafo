<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MdlUserInfoDataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MdlUserInfoDataTable Test Case
 */
class MdlUserInfoDataTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MdlUserInfoDataTable
     */
    public $MdlUserInfoData;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MdlUserInfoData'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MdlUserInfoData') ? [] : ['className' => MdlUserInfoDataTable::class];
        $this->MdlUserInfoData = TableRegistry::getTableLocator()->get('MdlUserInfoData', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MdlUserInfoData);

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
