<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Collection\Collection;

/**
 * MdlGradeItem Entity
 *
 * @property int $id
 * @property int|null $courseid
 * @property int|null $categoryid
 * @property string|null $itemname
 * @property string $itemtype
 * @property string|null $itemmodule
 * @property int|null $iteminstance
 * @property int|null $itemnumber
 * @property string|null $iteminfo
 * @property string|null $idnumber
 * @property string|null $calculation
 * @property int $gradetype
 * @property float $grademax
 * @property float $grademin
 * @property int|null $scaleid
 * @property int|null $outcomeid
 * @property float $gradepass
 * @property float $multfactor
 * @property float $plusfactor
 * @property float $aggregationcoef
 * @property float $aggregationcoef2
 * @property int $sortorder
 * @property int $display
 * @property bool|null $decimals
 * @property int $hidden
 * @property int $locked
 * @property int $locktime
 * @property int $needsupdate
 * @property bool $weightoverride
 * @property int|null $timecreated
 * @property int|null $timemodified
 */
class MdlGradeItem extends Entity
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
        'courseid' => true,
        'categoryid' => true,
        'itemname' => true,
        'itemtype' => true,
        'itemmodule' => true,
        'iteminstance' => true,
        'itemnumber' => true,
        'iteminfo' => true,
        'idnumber' => true,
        'calculation' => true,
        'gradetype' => true,
        'grademax' => true,
        'grademin' => true,
        'scaleid' => true,
        'outcomeid' => true,
        'gradepass' => true,
        'multfactor' => true,
        'plusfactor' => true,
        'aggregationcoef' => true,
        'aggregationcoef2' => true,
        'sortorder' => true,
        'display' => true,
        'decimals' => true,
        'hidden' => true,
        'locked' => true,
        'locktime' => true,
        'needsupdate' => true,
        'weightoverride' => true,
        'timecreated' => true,
        'timemodified' => true
    ];
    protected function _getArrayOrd(Collection $col)
     {
        
     }
}
