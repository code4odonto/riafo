<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlGradeItems Model
 *
 * @method \App\Model\Entity\MdlGradeItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlGradeItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlGradeItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlGradeItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGradeItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGradeItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGradeItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGradeItem findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlGradeItemsTable extends Table
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

        $this->setTable('mdl_grade_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        //ASOCIACIONES//
        $this->belongsTo('MdlCourse')
            ->setForeignKey('courseid')
            ->setJoinType('INNER');
        
        $this->belongsToMany('MdlUser', [
            'through' => 'MdlGradeGrades',
            'joinTable' => 'MdlUser',
            'foreignKey' => 'itemid',
            'targetForeignKey' => 'userid',
            'finder' => 'limitRows'
        ]);    

        // $this->hasMany('Mdl_grade_grades')
        //     ->setForeignKey('itemid');
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
            ->allowEmptyString('courseid');

        $validator
            ->allowEmptyString('categoryid');

        $validator
            ->scalar('itemname')
            ->maxLength('itemname', 255)
            ->allowEmptyString('itemname');

        $validator
            ->scalar('itemtype')
            ->maxLength('itemtype', 30)
            ->allowEmptyString('itemtype', false);

        $validator
            ->scalar('itemmodule')
            ->maxLength('itemmodule', 30)
            ->allowEmptyString('itemmodule');

        $validator
            ->allowEmptyString('iteminstance');

        $validator
            ->allowEmptyString('itemnumber');

        $validator
            ->scalar('iteminfo')
            ->maxLength('iteminfo', 4294967295)
            ->allowEmptyString('iteminfo');

        $validator
            ->scalar('idnumber')
            ->maxLength('idnumber', 255)
            ->allowEmptyString('idnumber');

        $validator
            ->scalar('calculation')
            ->maxLength('calculation', 4294967295)
            ->allowEmptyString('calculation');

        $validator
            ->allowEmptyString('gradetype', false);

        $validator
            ->decimal('grademax')
            ->allowEmptyString('grademax', false);

        $validator
            ->decimal('grademin')
            ->allowEmptyString('grademin', false);

        $validator
            ->allowEmptyString('scaleid');

        $validator
            ->allowEmptyString('outcomeid');

        $validator
            ->decimal('gradepass')
            ->allowEmptyString('gradepass', false);

        $validator
            ->decimal('multfactor')
            ->allowEmptyString('multfactor', false);

        $validator
            ->decimal('plusfactor')
            ->allowEmptyString('plusfactor', false);

        $validator
            ->decimal('aggregationcoef')
            ->allowEmptyString('aggregationcoef', false);

        $validator
            ->decimal('aggregationcoef2')
            ->allowEmptyString('aggregationcoef2', false);

        $validator
            ->allowEmptyString('sortorder', false);

        $validator
            ->allowEmptyString('display', false);

        $validator
            ->boolean('decimals')
            ->allowEmptyString('decimals');

        $validator
            ->allowEmptyString('hidden', false);

        $validator
            ->allowEmptyString('locked', false);

        $validator
            ->allowEmptyString('locktime', false);

        $validator
            ->allowEmptyString('needsupdate', false);

        $validator
            ->boolean('weightoverride')
            ->allowEmptyString('weightoverride', false);

        $validator
            ->allowEmptyString('timecreated');

        $validator
            ->allowEmptyString('timemodified');

        return $validator;
    }
}
