<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlCourse Entity
 *
 * @property int $id
 * @property int $category
 * @property int $sortorder
 * @property string $fullname
 * @property string $shortname
 * @property string $idnumber
 * @property string|null $summary
 * @property int $summaryformat
 * @property string $format
 * @property int $showgrades
 * @property int $newsitems
 * @property int $startdate
 * @property int $enddate
 * @property int $marker
 * @property int $maxbytes
 * @property int $legacyfiles
 * @property int $showreports
 * @property bool $visible
 * @property bool $visibleold
 * @property int $groupmode
 * @property int $groupmodeforce
 * @property int $defaultgroupingid
 * @property string $lang
 * @property string $calendartype
 * @property string $theme
 * @property int $timecreated
 * @property int $timemodified
 * @property bool $requested
 * @property bool $enablecompletion
 * @property bool $completionnotify
 * @property int $cacherev
 */
class MdlCourse extends Entity
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
        'category' => true,
        'sortorder' => true,
        'fullname' => true,
        'shortname' => true,
        'idnumber' => true,
        'summary' => true,
        'summaryformat' => true,
        'format' => true,
        'showgrades' => true,
        'newsitems' => true,
        'startdate' => true,
        'enddate' => true,
        'marker' => true,
        'maxbytes' => true,
        'legacyfiles' => true,
        'showreports' => true,
        'visible' => true,
        'visibleold' => true,
        'groupmode' => true,
        'groupmodeforce' => true,
        'defaultgroupingid' => true,
        'lang' => true,
        'calendartype' => true,
        'theme' => true,
        'timecreated' => true,
        'timemodified' => true,
        'requested' => true,
        'enablecompletion' => true,
        'completionnotify' => true,
        'cacherev' => true
    ];
}
