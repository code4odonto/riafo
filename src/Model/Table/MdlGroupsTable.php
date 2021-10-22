<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlGroups Model
 *
 * @method \App\Model\Entity\MdlGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlGroupsTable extends Table
{
    // $entityMembers
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('mdl_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        //ASOCIACIONES//
        $this->belongsTo('MdlCourse', [
            'foreignKey' => 'courseid',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('MdlUser', [
            'joinTable' => 'MdlUser',
            'through' => 'MdlGroupsMembers',
            'foreignKey' => 'groupid',
            'targetForeignKey' => 'userid',
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
            ->requirePresence('courseid', 'create')
            ->allowEmptyString('courseid', false);

        $validator
            ->scalar('idnumber')
            ->maxLength('idnumber', 100)
            ->allowEmptyString('idnumber', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 254)
            ->allowEmptyString('name', false);

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmptyString('description');

        $validator
            ->allowEmptyString('descriptionformat', false);

        $validator
            ->scalar('enrolmentkey')
            ->maxLength('enrolmentkey', 50)
            ->allowEmptyString('enrolmentkey');

        $validator
            ->allowEmptyString('picture', false);

        $validator
            ->boolean('hidepicture')
            ->allowEmptyString('hidepicture', false);

        $validator
            ->allowEmptyString('timecreated', false);

        $validator
            ->allowEmptyString('timemodified', false);

        return $validator;
    }
    public function findLimitRows(Query $query, array $options)
    {
        $query->select(['id', 'courseid', 'name', 'description'])
            ->contain(['MdlCourse' => function(Query $q) {
                return $q->select(['id', 'fullname', 'summary']);
            }]);
        return $query;
    }

}
