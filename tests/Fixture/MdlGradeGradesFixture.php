<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MdlGradeGradesFixture
 */
class MdlGradeGradesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'itemid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'userid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'rawgrade' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'rawgrademax' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '100.00000', 'comment' => ''],
        'rawgrademin' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => false, 'default' => '0.00000', 'comment' => ''],
        'rawscaleid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usermodified' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'finalgrade' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'hidden' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'locked' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'locktime' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'exported' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'overridden' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'excluded' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'feedback' => ['type' => 'text', 'length' => 4294967295, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'feedbackformat' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'information' => ['type' => 'text', 'length' => 4294967295, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'informationformat' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'timecreated' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'timemodified' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'aggregationstatus' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => 'unknown', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'aggregationweight' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        '_indexes' => [
            'mdl_gradgrad_locloc_ix' => ['type' => 'index', 'columns' => ['locked', 'locktime'], 'length' => []],
            'mdl_gradgrad_ite_ix' => ['type' => 'index', 'columns' => ['itemid'], 'length' => []],
            'mdl_gradgrad_use_ix' => ['type' => 'index', 'columns' => ['userid'], 'length' => []],
            'mdl_gradgrad_raw_ix' => ['type' => 'index', 'columns' => ['rawscaleid'], 'length' => []],
            'mdl_gradgrad_use2_ix' => ['type' => 'index', 'columns' => ['usermodified'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'mdl_gradgrad_useite_uix' => ['type' => 'unique', 'columns' => ['userid', 'itemid'], 'length' => []],
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
                'itemid' => 1,
                'userid' => 1,
                'rawgrade' => 1.5,
                'rawgrademax' => 1.5,
                'rawgrademin' => 1.5,
                'rawscaleid' => 1,
                'usermodified' => 1,
                'finalgrade' => 1.5,
                'hidden' => 1,
                'locked' => 1,
                'locktime' => 1,
                'exported' => 1,
                'overridden' => 1,
                'excluded' => 1,
                'feedback' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'feedbackformat' => 1,
                'information' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'informationformat' => 1,
                'timecreated' => 1,
                'timemodified' => 1,
                'aggregationstatus' => 'Lorem ip',
                'aggregationweight' => 1.5
            ],
        ];
        parent::init();
    }
}
