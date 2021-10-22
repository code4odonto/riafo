<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlAttendance Entity
 *
 * @property int $id
 * @property int $course
 * @property string|null $name
 * @property int $grade
 * @property int $timemodified
 * @property string|null $intro
 * @property int $introformat
 * @property string|null $subnet
 * @property string $sessiondetailspos
 * @property bool $showsessiondetails
 * @property bool $showextrauserdetails
 */
class MdlAttendance extends Entity
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
        'course' => true,
        'name' => true,
        'grade' => true,
        'timemodified' => true,
        'intro' => true,
        'introformat' => true,
        'subnet' => true,
        'sessiondetailspos' => true,
        'showsessiondetails' => true,
        'showextrauserdetails' => true
    ];
}
