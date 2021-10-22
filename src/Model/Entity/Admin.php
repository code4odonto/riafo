<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
/**
 * Admin Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class Admin extends Entity
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
        'username' => true,
        'password' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($value)
    {
        if (!empty($value))
        {
            $hasher = new DefaultPasswordHasher();
            return $hasher->hash($value);
        }
        $id_admin = $this->_properties['id'];
        $admin = TableRegistry::get('Admins')->recuperarContraseña($id_admin);
        return $admin;
    }
}
