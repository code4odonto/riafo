<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MdlGradeItemsFixture
 */
class MdlGradeItemsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'courseid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'categoryid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'itemname' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'itemtype' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'itemmodule' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'iteminstance' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'itemnumber' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'iteminfo' => ['type' => 'text', 'length' => 4294967295, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'idnumber' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'calculation' => ['type' => 'text', 'length' => 4294967295, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'gradetype' => ['type' => 'smallinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'grademax' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '100.00000', 'comment' => ''],
        'grademin' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '0.00000', 'comment' => ''],
        'scaleid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'outcomeid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'gradepass' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '0.00000', 'comment' => ''],
        'multfactor' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '1.00000', 'comment' => ''],
        'plusfactor' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '0.00000', 'comment' => ''],
        'aggregationcoef' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '0.00000', 'comment' => ''],
        'aggregationcoef2' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '0.00000', 'comment' => ''],
        'sortorder' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'display' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'decimals' => ['type' => 'boolean', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'hidden' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'locked' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'locktime' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'needsupdate' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'weightoverride' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'timecreated' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'timemodified' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'mdl_graditem_locloc_ix' => ['type' => 'index', 'columns' => ['locked', 'locktime'], 'length' => []],
            'mdl_graditem_itenee_ix' => ['type' => 'index', 'columns' => ['itemtype', 'needsupdate'], 'length' => []],
            'mdl_graditem_gra_ix' => ['type' => 'index', 'columns' => ['gradetype'], 'length' => []],
            'mdl_graditem_idncou_ix' => ['type' => 'index', 'columns' => ['idnumber', 'courseid'], 'length' => []],
            'mdl_graditem_cou_ix' => ['type' => 'index', 'columns' => ['courseid'], 'length' => []],
            'mdl_graditem_cat_ix' => ['type' => 'index', 'columns' => ['categoryid'], 'length' => []],
            'mdl_graditem_sca_ix' => ['type' => 'index', 'columns' => ['scaleid'], 'length' => []],
            'mdl_graditem_out_ix' => ['type' => 'index', 'columns' => ['outcomeid'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'courseid' => 1,
                'categoryid' => 1,
                'itemname' => 'Lorem ipsum dolor sit amet',
                'itemtype' => 'Lorem ipsum dolor sit amet',
                'itemmodule' => 'Lorem ipsum dolor sit amet',
                'iteminstance' => 1,
                'itemnumber' => 1,
                'iteminfo' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'idnumber' => 'Lorem ipsum dolor sit amet',
                'calculation' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'gradetype' => 1,
                'grademax' => 1.5,
                'grademin' => 1.5,
                'scaleid' => 1,
                'outcomeid' => 1,
                'gradepass' => 1.5,
                'multfactor' => 1.5,
                'plusfactor' => 1.5,
                'aggregationcoef' => 1.5,
                'aggregationcoef2' => 1.5,
                'sortorder' => 1,
                'display' => 1,
                'decimals' => 1,
                'hidden' => 1,
                'locked' => 1,
                'locktime' => 1,
                'needsupdate' => 1,
                'weightoverride' => 1,
                'timecreated' => 1,
                'timemodified' => 1
            ],
        ];
        parent::init();
    }
}
