<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MdlUserFixture
 */
class MdlUserFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'mdl_user';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'auth' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => 'manual', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'confirmed' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'policyagreed' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'deleted' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'suspended' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'mnethostid' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'username' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'idnumber' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'firstname' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastname' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'email' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'emailstop' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'icq' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'skype' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'yahoo' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'aim' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'msn' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone1' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone2' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'institution' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'department' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'address' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'city' => ['type' => 'string', 'length' => 120, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'country' => ['type' => 'string', 'length' => 2, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lang' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => 'en', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'calendartype' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => 'gregorian', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'theme' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'timezone' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => '99', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'firstaccess' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lastaccess' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lastlogin' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'currentlogin' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lastip' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'secret' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'picture' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'url' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => '', 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'text', 'length' => 4294967295, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null],
        'descriptionformat' => ['type' => 'tinyinteger', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'mailformat' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'maildigest' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'maildisplay' => ['type' => 'tinyinteger', 'length' => 2, 'unsigned' => false, 'null' => false, 'default' => '2', 'comment' => '', 'precision' => null],
        'autosubscribe' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'trackforums' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'timecreated' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'timemodified' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'trustbitmask' => ['type' => 'biginteger', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'imagealt' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'lastnamephonetic' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'firstnamephonetic' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'middlename' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'alternatename' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'mdl_user_del_ix' => ['type' => 'index', 'columns' => ['deleted'], 'length' => []],
            'mdl_user_con_ix' => ['type' => 'index', 'columns' => ['confirmed'], 'length' => []],
            'mdl_user_fir_ix' => ['type' => 'index', 'columns' => ['firstname'], 'length' => []],
            'mdl_user_las_ix' => ['type' => 'index', 'columns' => ['lastname'], 'length' => []],
            'mdl_user_cit_ix' => ['type' => 'index', 'columns' => ['city'], 'length' => []],
            'mdl_user_cou_ix' => ['type' => 'index', 'columns' => ['country'], 'length' => []],
            'mdl_user_las2_ix' => ['type' => 'index', 'columns' => ['lastaccess'], 'length' => []],
            'mdl_user_ema_ix' => ['type' => 'index', 'columns' => ['email'], 'length' => []],
            'mdl_user_aut_ix' => ['type' => 'index', 'columns' => ['auth'], 'length' => []],
            'mdl_user_idn_ix' => ['type' => 'index', 'columns' => ['idnumber'], 'length' => []],
            'mdl_user_fir2_ix' => ['type' => 'index', 'columns' => ['firstnamephonetic'], 'length' => []],
            'mdl_user_las3_ix' => ['type' => 'index', 'columns' => ['lastnamephonetic'], 'length' => []],
            'mdl_user_mid_ix' => ['type' => 'index', 'columns' => ['middlename'], 'length' => []],
            'mdl_user_alt_ix' => ['type' => 'index', 'columns' => ['alternatename'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'mdl_user_mneuse_uix' => ['type' => 'unique', 'columns' => ['mnethostid', 'username'], 'length' => []],
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
                'auth' => 'Lorem ipsum dolor ',
                'confirmed' => 1,
                'policyagreed' => 1,
                'deleted' => 1,
                'suspended' => 1,
                'mnethostid' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'idnumber' => 'Lorem ipsum dolor sit amet',
                'firstname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'emailstop' => 1,
                'icq' => 'Lorem ipsum d',
                'skype' => 'Lorem ipsum dolor sit amet',
                'yahoo' => 'Lorem ipsum dolor sit amet',
                'aim' => 'Lorem ipsum dolor sit amet',
                'msn' => 'Lorem ipsum dolor sit amet',
                'phone1' => 'Lorem ipsum dolor ',
                'phone2' => 'Lorem ipsum dolor ',
                'institution' => 'Lorem ipsum dolor sit amet',
                'department' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'country' => 'Lo',
                'lang' => 'Lorem ipsum dolor sit amet',
                'calendartype' => 'Lorem ipsum dolor sit amet',
                'theme' => 'Lorem ipsum dolor sit amet',
                'timezone' => 'Lorem ipsum dolor sit amet',
                'firstaccess' => 1,
                'lastaccess' => 1,
                'lastlogin' => 1,
                'currentlogin' => 1,
                'lastip' => 'Lorem ipsum dolor sit amet',
                'secret' => 'Lorem ipsum d',
                'picture' => 1,
                'url' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'descriptionformat' => 1,
                'mailformat' => 1,
                'maildigest' => 1,
                'maildisplay' => 1,
                'autosubscribe' => 1,
                'trackforums' => 1,
                'timecreated' => 1,
                'timemodified' => 1,
                'trustbitmask' => 1,
                'imagealt' => 'Lorem ipsum dolor sit amet',
                'lastnamephonetic' => 'Lorem ipsum dolor sit amet',
                'firstnamephonetic' => 'Lorem ipsum dolor sit amet',
                'middlename' => 'Lorem ipsum dolor sit amet',
                'alternatename' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
