<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlEnrol Entity
 *
 * @property int $id
 * @property string $enrol
 * @property int $status
 * @property int $courseid
 * @property int $sortorder
 * @property string|null $name
 * @property int|null $enrolperiod
 * @property int|null $enrolstartdate
 * @property int|null $enrolenddate
 * @property bool|null $expirynotify
 * @property int|null $expirythreshold
 * @property bool|null $notifyall
 * @property string|null $password
 * @property string|null $cost
 * @property string|null $currency
 * @property int|null $roleid
 * @property int|null $customint1
 * @property int|null $customint2
 * @property int|null $customint3
 * @property int|null $customint4
 * @property int|null $customint5
 * @property int|null $customint6
 * @property int|null $customint7
 * @property int|null $customint8
 * @property string|null $customchar1
 * @property string|null $customchar2
 * @property string|null $customchar3
 * @property float|null $customdec1
 * @property float|null $customdec2
 * @property string|null $customtext1
 * @property string|null $customtext2
 * @property string|null $customtext3
 * @property string|null $customtext4
 * @property int $timecreated
 * @property int $timemodified
 */
class MdlEnrol extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'enrol' => true,
        'status' => true,
        'courseid' => true,
        'sortorder' => true,
        'name' => true,
        'enrolperiod' => true,
        'enrolstartdate' => true,
        'enrolenddate' => true,
        'expirynotify' => true,
        'expirythreshold' => true,
        'notifyall' => true,
        'password' => true,
        'cost' => true,
        'currency' => true,
        'roleid' => true,
        'customint1' => true,
        'customint2' => true,
        'customint3' => true,
        'customint4' => true,
        'customint5' => true,
        'customint6' => true,
        'customint7' => true,
        'customint8' => true,
        'customchar1' => true,
        'customchar2' => true,
        'customchar3' => true,
        'customdec1' => true,
        'customdec2' => true,
        'customtext1' => true,
        'customtext2' => true,
        'customtext3' => true,
        'customtext4' => true,
        'timecreated' => true,
        'timemodified' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
