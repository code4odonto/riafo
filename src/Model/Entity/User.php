<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $nombre
 * @property string $apellido
 * @property string $rol
 * @property string|null $password
 * @property string|null $password_reset_token
 * @property string|null $hashval
 * @property string $email
 * @property string $telefono
 * @property string $direccion
 * @property string $ciudad
 * @property string $pais
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class User extends Entity
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
        'dni' => true,
        'nombre' => true,
        'apellido' => true,
        'rol' => true,
        'password' => true,
        'password_reset_token' => true,
        'hashval' => true,
        'email' => true,
        'telefono' => true,
        'direccion' => true,
        'ciudad' => true,
        'pais' => true,
        'created' => true,
        'modified' => true
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
        $id_user = $this->_properties['id'];
        $user= TableRegistry::get('Users')->recuperarContraseña($id_user);
        return $user;
    }
    protected function _getFullName()
    {
         return $this->_properties['nombre'] . ' ' . $this->_properties['apellido'];
    }

}
