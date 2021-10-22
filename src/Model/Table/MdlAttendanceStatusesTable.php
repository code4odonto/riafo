<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlAttendanceStatuses Model
 *
 * @method \App\Model\Entity\MdlAttendanceStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlAttendanceStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendanceStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendanceStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlAttendanceStatusesTable extends Table
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

        $this->setTable('mdl_attendance_statuses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MdlAttendance')
            ->setForeignKey('attendanceid')
            ->setJoinType('INNER');

        $this->hasMany('MdlAttendanceLog')
            ->setForeignKey('statusid');
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
            ->allowEmptyString('attendanceid', false);

        $validator
            ->scalar('acronym')
            ->maxLength('acronym', 2)
            ->allowEmptyString('acronym', false);

        $validator
            ->scalar('description')
            ->maxLength('description', 30)
            ->allowEmptyString('description', false);

        $validator
            ->decimal('grade')
            ->allowEmptyString('grade', false);

        $validator
            ->allowEmptyString('studentavailability');

        $validator
            ->allowEmptyString('setunmarked');

        $validator
            ->boolean('visible')
            ->allowEmptyString('visible', false);

        $validator
            ->boolean('deleted')
            ->allowEmptyString('deleted', false);

        $validator
            ->integer('setnumber')
            ->allowEmptyString('setnumber', false);

        return $validator;
    }
}
