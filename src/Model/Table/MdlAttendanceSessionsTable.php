<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * MdlAttendanceSessions Model
 *
 * @method \App\Model\Entity\MdlAttendanceSession get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlAttendanceSession newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceSession[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceSession|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendanceSession saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlAttendanceSession patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceSession[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlAttendanceSession findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlAttendanceSessionsTable extends Table
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

        $this->setTable('mdl_attendance_sessions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('MdlAttendanceLog')
        ->setForeignKey('sessionid')
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
            ->allowEmptyString('attendanceid', false);

        $validator
            ->allowEmptyString('groupid', false);

        $validator
            ->allowEmptyString('sessdate', false);

        $validator
            ->allowEmptyString('duration', false);

        $validator
            ->allowEmptyString('lasttaken');

        $validator
            ->allowEmptyString('lasttakenby', false);

        $validator
            ->allowEmptyString('timemodified');

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        $validator
            ->allowEmptyString('descriptionformat', false);

        $validator
            ->boolean('studentscanmark')
            ->allowEmptyString('studentscanmark', false);

        $validator
            ->boolean('autoassignstatus')
            ->allowEmptyString('autoassignstatus', false);

        $validator
            ->scalar('studentpassword')
            ->maxLength('studentpassword', 50)
            ->allowEmptyString('studentpassword');

        $validator
            ->scalar('subnet')
            ->maxLength('subnet', 255)
            ->allowEmptyString('subnet');

        $validator
            ->boolean('automark')
            ->allowEmptyString('automark', false);

        $validator
            ->boolean('automarkcompleted')
            ->allowEmptyString('automarkcompleted', false);

        $validator
            ->integer('statusset')
            ->allowEmptyString('statusset', false);

        $validator
            ->boolean('absenteereport')
            ->allowEmptyString('absenteereport', false);

        $validator
            ->allowEmptyString('caleventid', false);

        return $validator;
    }
    public function findLimitRows(Query $query, array $options)
    {
        return $query->order(['FROM_UNIXTIME(`MdlAttendanceSessions.sessdate`)' => 'ASC']);
    }
}
