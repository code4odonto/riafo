<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlGroupsMembers Model
 *
 * @method \App\Model\Entity\MdlGroupsMember get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlGroupsMember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlGroupsMember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlGroupsMember|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGroupsMember saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGroupsMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGroupsMember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGroupsMember findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlGroupsMembersTable extends Table
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

        $this->setTable('mdl_groups_members');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        //ASOCIACIONES//
        $this->belongsTo('MdlUser', [
            'foreignKey' => 'userid',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MdlGroups', [
            'foreignKey' => 'groupid',
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
            ->allowEmptyString('groupid', false);

        $validator
            ->allowEmptyString('userid', false);

        $validator
            ->allowEmptyString('timeadded', false);

        $validator
            ->scalar('component')
            ->maxLength('component', 100)
            ->allowEmptyString('component', false);

        $validator
            ->allowEmptyString('itemid', false);

        return $validator;
    }
}
