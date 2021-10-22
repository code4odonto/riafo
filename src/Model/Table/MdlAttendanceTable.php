<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlAttendance Model
 *
 * @method \App\Model\Entity\MdlAttendance get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlAttendance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlAttendance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendance saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendance findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlAttendanceTable extends Table
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

        $this->setTable('mdl_attendance');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('MdlCourse')
            ->setForeignKey('course')
            ->setJoinType('INNER');

        $this->hasMany('MdlAttendanceStatuses')
            ->setForeignKey('attendanceid')
            ->setJoinType('INNER');
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
            ->allowEmptyString('course', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->allowEmptyString('grade', false);

        $validator
            ->allowEmptyString('timemodified', false);

        $validator
            ->scalar('intro')
            ->maxLength('intro', 4294967295)
            ->allowEmptyString('intro');

        $validator
            ->allowEmptyString('introformat', false);

        $validator
            ->scalar('subnet')
            ->maxLength('subnet', 255)
            ->allowEmptyString('subnet');

        $validator
            ->scalar('sessiondetailspos')
            ->maxLength('sessiondetailspos', 5)
            ->allowEmptyString('sessiondetailspos', false);

        $validator
            ->boolean('showsessiondetails')
            ->allowEmptyString('showsessiondetails', false);

        $validator
            ->boolean('showextrauserdetails')
            ->allowEmptyString('showextrauserdetails', false);

        return $validator;
    }
}
