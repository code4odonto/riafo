<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlAttendanceStatus Entity
 *
 * @property int $id
 * @property int $attendanceid
 * @property string $acronym
 * @property string $description
 * @property float $grade
 * @property int|null $studentavailability
 * @property int|null $setunmarked
 * @property bool $visible
 * @property bool $deleted
 * @property int $setnumber
 */
class MdlAttendanceStatus extends Entity
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
        'acronym' => true,
        'description' => true,
        'grade' => true,
        'studentavailability' => true,
        'setunmarked' => true,
        'visible' => true,
        'deleted' => true,
        'setnumber' => true
    ];
}
