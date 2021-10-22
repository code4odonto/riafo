<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlCourse Model
 *
 * @method \App\Model\Entity\MdlCourse get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlCourse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlCourse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlCourse|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlCourse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlCourse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlCourse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlCourse findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlCourseTable extends Table
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

        $this->setTable('mdl_course');
        $this->setDisplayField('fullname');
        $this->setPrimaryKey('id');

        //ASOCIACIONES//
        $this->hasMany('MdlGroups')
            ->setForeignKey('courseid');

        $this->hasMany('MdlGradeItems')            
            ->setForeignKey('courseid');

        $this->hasMany('MdlAttendance')
            ->setForeignKey('course')
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
            ->allowEmptyString('category', false);

        $validator
            ->allowEmptyString('sortorder', false);

        $validator
            ->scalar('fullname')
            ->maxLength('fullname', 254)
            ->allowEmptyString('fullname', false);

        $validator
            ->scalar('shortname')
            ->maxLength('shortname', 255)
            ->allowEmptyString('shortname', false);

        $validator
            ->scalar('idnumber')
            ->maxLength('idnumber', 100)
            ->allowEmptyString('idnumber', false);

        $validator
            ->scalar('summary')
            ->maxLength('summary', 4294967295)
            ->allowEmptyString('summary');

        $validator
            ->allowEmptyString('summaryformat', false);

        $validator
            ->scalar('format')
            ->maxLength('format', 21)
            ->allowEmptyString('format', false);

        $validator
            ->allowEmptyString('showgrades', false);

        $validator
            ->integer('newsitems')
            ->allowEmptyString('newsitems', false);

        $validator
            ->allowEmptyString('startdate', false);

        $validator
            ->allowEmptyString('enddate', false);

        $validator
            ->allowEmptyString('marker', false);

        $validator
            ->allowEmptyString('maxbytes', false);

        $validator
            ->allowEmptyFile('legacyfiles', false);

        $validator
            ->allowEmptyString('showreports', false);

        $validator
            ->boolean('visible')
            ->allowEmptyString('visible', false);

        $validator
            ->boolean('visibleold')
            ->allowEmptyString('visibleold', false);

        $validator
            ->allowEmptyString('groupmode', false);

        $validator
            ->allowEmptyString('groupmodeforce', false);

        $validator
            ->allowEmptyString('defaultgroupingid', false);

        $validator
            ->scalar('lang')
            ->maxLength('lang', 30)
            ->allowEmptyString('lang', false);

        $validator
            ->scalar('calendartype')
            ->maxLength('calendartype', 30)
            ->allowEmptyString('calendartype', false);

        $validator
            ->scalar('theme')
            ->maxLength('theme', 50)
            ->allowEmptyString('theme', false);

        $validator
            ->allowEmptyString('timecreated', false);

        $validator
            ->allowEmptyString('timemodified', false);

        $validator
            ->boolean('requested')
            ->allowEmptyString('requested', false);

        $validator
            ->boolean('enablecompletion')
            ->allowEmptyString('enablecompletion', false);

        $validator
            ->boolean('completionnotify')
            ->allowEmptyString('completionnotify', false);

        $validator
            ->allowEmptyString('cacherev', false);

        return $validator;
    }
    public function findLimitRows(Query $query, array $options)
    {
        $query->select(['id', 'fullname', 'summary']);
        return $query;
    }
}
