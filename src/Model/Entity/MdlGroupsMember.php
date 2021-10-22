<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlGroupsMember Entity
 *
 * @property int $id
 * @property int $groupid
 * @property int $userid
 * @property int $timeadded
 * @property string $component
 * @property int $itemid
 */
class MdlGroupsMember extends Entity
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
        'groupid' => true,
        'userid' => true,
        'timeadded' => true,
        'component' => true,
        'itemid' => true
    ];
}
