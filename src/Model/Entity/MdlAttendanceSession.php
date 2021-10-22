<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlAttendanceSession Entity
 *
 * @property int $id
 * @property int $attendanceid
 * @property int $groupid
 * @property int $sessdate
 * @property int $duration
 * @property int|null $lasttaken
 * @property int $lasttakenby
 * @property int|null $timemodified
 * @property string $description
 * @property int $descriptionformat
 * @property bool $studentscanmark
 * @property bool $autoassignstatus
 * @property string|null $studentpassword
 * @property string|null $subnet
 * @property bool $automark
 * @property bool $automarkcompleted
 * @property int $statusset
 * @property bool $absenteereport
 * @property int $caleventid
 */
class MdlAttendanceSession extends Entity
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
        'attendanceid' => true,
        'groupid' => true,
        'sessdate' => true,
        'duration' => true,
        'lasttaken' => true,
        'lasttakenby' => true,
        'timemodified' => true,
        'description' => true,
        'descriptionformat' => true,
        'studentscanmark' => true,
        'autoassignstatus' => true,
        'studentpassword' => true,
        'subnet' => true,
        'automark' => true,
        'automarkcompleted' => true,
        'statusset' => true,
        'absenteereport' => true,
        'caleventid' => true
    ];
}
