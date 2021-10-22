<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Condiciones Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\MateriasTable|\Cake\ORM\Association\BelongsTo $Materias
 * @property \App\Model\Table\ComisionsTable|\Cake\ORM\Association\BelongsTo $Comisions
 *
 * @method \App\Model\Entity\Condicione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Condicione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Condicione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Condicione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Condicione saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Condicione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Condicione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Condicione findOrCreate($search, callable $callback = null, $options = [])
 */
class CondicionesTable extends Table
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

        $this->setTable('condiciones');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
    public function buildRules(RulesChecker $rules)
    {
        // $rules->add($rules->existsIn(['user_id'], 'Users'));

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
