<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlUserEnrolments Model
 *
 * @method \App\Model\Entity\MdlUserEnrolment get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlUserEnrolment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlUserEnrolment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlUserEnrolment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlUserEnrolment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlUserEnrolment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlUserEnrolment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlUserEnrolment findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlUserEnrolmentsTable extends Table
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

        $this->setTable('mdl_user_enrolments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MdlUser', [
            'foreignKey' => 'userid',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MdlEnrol', [
            'foreignKey' => 'enrolid',
            'joinType' => 'INNER',
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
            ->allowEmptyString('status', false);

        $validator
            ->requirePresence('enrolid', 'create')
            ->allowEmptyString('enrolid', false);

        $validator
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        $validator
            ->allowEmptyString('timestart', false);

        $validator
            ->allowEmptyString('timeend', false);

        $validator
            ->allowEmptyString('modifierid', false);

        $validator
            ->allowEmptyString('timecreated', false);

        $validator
            ->allowEmptyString('timemodified', false);

        return $validator;
    }
}
