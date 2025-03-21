<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MdlUserInfoData Entity
 *
 * @property int $id
 * @property int $userid
 * @property int $fieldid
 * @property string $data
 * @property int $dataformat
 */
class MdlUserInfoData extends Entity
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
        'userid' => true,
        'fieldid' => true,
        'data' => true,
        'dataformat' => true
    ];
}
