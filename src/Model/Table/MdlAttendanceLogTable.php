<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlAttendanceLog Model
 *
 * @method \App\Model\Entity\MdlAttendanceLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlAttendanceLog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendanceLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendanceLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceLog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceLog findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlAttendanceLogTable extends Table
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

        $this->setTable('mdl_attendance_log');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('MdlAttendanceSessions')
            ->setForeignKey('sessionid')
            ->setJoinType('INNER');

        $this->belongsTo('MdlUser')
            ->setForeignKey('studentid')
            ->setJoinType('INNER');

        $this->belongsTo('MdlAttendanceStatuses')
            ->setForeignKey('statusid')
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
            ->allowEmptyString('sessionid', false);

        $validator
            ->allowEmptyString('studentid', false);

        $validator
            ->allowEmptyString('statusid', false);

        $validator
            ->scalar('statusset')
            ->maxLength('statusset', 100)
            ->allowEmptyString('statusset');

        $validator
            ->allowEmptyString('timetaken', false);

        $validator
            ->allowEmptyString('takenby', false);

        $validator
            ->scalar('remarks')
            ->maxLength('remarks', 255)
            ->allowEmptyString('remarks');

        return $validator;
    }
}
