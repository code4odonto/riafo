<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlGradeGrade Entity
 *
 * @property int $id
 * @property int $itemid
 * @property int $userid
 * @property float|null $rawgrade
 * @property float $rawgrademax
 * @property float $rawgrademin
 * @property int|null $rawscaleid
 * @property int|null $usermodified
 * @property float|null $finalgrade
 * @property int $hidden
 * @property int $locked
 * @property int $locktime
 * @property int $exported
 * @property int $overridden
 * @property int $excluded
 * @property string|null $feedback
 * @property int $feedbackformat
 * @property string|null $information
 * @property int $informationformat
 * @property int|null $timecreated
 * @property int|null $timemodified
 * @property string $aggregationstatus
 * @property float|null $aggregationweight
 */
class MdlGradeGrade extends Entity
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
        'itemid' => true,
        'userid' => true,
        'rawgrade' => true,
        'rawgrademax' => true,
        'rawgrademin' => true,
        'rawscaleid' => true,
        'usermodified' => true,
        'finalgrade' => true,
        'hidden' => true,
        'locked' => true,
        'locktime' => true,
        'exported' => true,
        'overridden' => true,
        'excluded' => true,
        'feedback' => true,
        'feedbackformat' => true,
        'information' => true,
        'informationformat' => true,
        'timecreated' => true,
        'timemodified' => true,
        'aggregationstatus' => true,
        'aggregationweight' => true
    ];
}
