<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CondicionesTest Model
 *
 * @method \App\Model\Entity\CondicionesTest get($primaryKey, $options = [])
 * @method \App\Model\Entity\CondicionesTest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CondicionesTest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CondicionesTest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CondicionesTest saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CondicionesTest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CondicionesTest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CondicionesTest findOrCreate($search, callable $callback = null, $options = [])
 */
class CondicionesTestTable extends Table
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

        $this->setTable('condiciones_test');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->boolean('recuperatorio')
            ->allowEmptyString('recuperatorio', false);

        $validator
            ->dateTime('fecha')
            ->requirePresence('fecha', 'create')
            ->allowEmptyDateTime('fecha', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['user_id'], 'Users'));
    //     $rules->add($rules->existsIn(['materia_id'], 'Materias'));
    //     $rules->add($rules->existsIn(['comision_id'], 'Comisions'));

    //     return $rules;
    // }

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
