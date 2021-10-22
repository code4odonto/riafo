<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlAttendanceLog Entity
 *
 * @property int $id
 * @property int $sessionid
 * @property int $studentid
 * @property int $statusid
 * @property string|null $statusset
 * @property int $timetaken
 * @property int $takenby
 * @property string|null $remarks
 */
class MdlAttendanceLog extends Entity
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
        'sessionid' => true,
        'studentid' => true,
        'statusid' => true,
        'statusset' => true,
        'timetaken' => true,
        'takenby' => true,
        'remarks' => true
    ];
}
