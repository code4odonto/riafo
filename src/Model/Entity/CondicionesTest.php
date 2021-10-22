<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CondicionesTest Entity
 *
 * @property int $id
 * @property int $user_id
 * @property bool $recuperatorio
 * @property int $materia_id
 * @property int $comision_id
 * @property \Cake\I18n\FrozenTime $fecha
 *

 */
class CondicionesTest extends Entity
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
        'user_id' => true,
        'recuperatorio' => true,
        'materia_id' => true,
        'comision_id' => true,
        'fecha' => true,
    ];
}
