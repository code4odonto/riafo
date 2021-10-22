<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('dni')
            ->maxLength('dni', 20)
            ->requirePresence('dni', 'create')
            ->allowEmptyString('dni', false);

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->allowEmptyString('nombre', false);

        $validator
            ->scalar('apellido')
            ->maxLength('apellido', 100)
            ->requirePresence('apellido', 'create')
            ->allowEmptyString('apellido', false);

        $validator
            ->scalar('rol')
            ->allowEmptyString('rol', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password');

        $validator
            ->scalar('password_reset_token')
            ->maxLength('password_reset_token', 255)
            ->allowEmptyString('password_reset_token');

        $validator
            ->scalar('hashval')
            ->maxLength('hashval', 255)
            ->allowEmptyString('hashval');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->scalar('telefono')
            ->maxLength('telefono', 20)
            ->requirePresence('telefono', 'create')
            ->allowEmptyString('telefono', false);

        $validator
            ->scalar('direccion')
            ->maxLength('direccion', 255)
            ->requirePresence('direccion', 'create')
            ->allowEmptyString('direccion', false);

        $validator
            ->scalar('ciudad')
            ->maxLength('ciudad', 120)
            ->requirePresence('ciudad', 'create')
            ->allowEmptyString('ciudad', false);

        $validator
            ->scalar('pais')
            ->maxLength('pais', 100)
            ->requirePresence('pais', 'create')
            ->allowEmptyString('pais', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['dni']));
        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'riafo';
    }
}
