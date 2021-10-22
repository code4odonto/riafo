<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlGradeGrades Model
 *
 * @method \App\Model\Entity\MdlGradeGrade get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlGradeGrade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlGradeGrade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlGradeGrade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGradeGrade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlGradeGrade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGradeGrade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlGradeGrade findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlGradeGradesTable extends Table
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

        $this->setTable('mdl_grade_grades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        //ASOCIACIONES//
        $this->belongsTo('MdlUser', [
            'foreignKey' => 'userid',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('MdlGradeItems', [
            'foreignKey' => 'itemid',
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
            ->requirePresence('itemid', 'create')
            ->allowEmptyString('itemid', false);

        $validator
            ->requirePresence('userid', 'create')
            ->allowEmptyString('userid', false);

        $validator
            ->decimal('rawgrade')
            ->allowEmptyString('rawgrade');

        $validator
            ->decimal('rawgrademax')
            ->allowEmptyString('rawgrademax', false);

        $validator
            ->decimal('rawgrademin')
            ->allowEmptyString('rawgrademin', false);

        $validator
            ->allowEmptyString('rawscaleid');

        $validator
            ->allowEmptyString('usermodified');

        $validator
            ->decimal('finalgrade')
            ->allowEmptyString('finalgrade');

        $validator
            ->allowEmptyString('hidden', false);

        $validator
            ->allowEmptyString('locked', false);

        $validator
            ->allowEmptyString('locktime', false);

        $validator
            ->allowEmptyString('exported', false);

        $validator
            ->allowEmptyString('overridden', false);

        $validator
            ->allowEmptyString('excluded', false);

        $validator
            ->scalar('feedback')
            ->maxLength('feedback', 4294967295)
            ->allowEmptyString('feedback');

        $validator
            ->allowEmptyString('feedbackformat', false);

        $validator
            ->scalar('information')
            ->maxLength('information', 4294967295)
            ->allowEmptyString('information');

        $validator
            ->allowEmptyString('informationformat', false);

        $validator
            ->allowEmptyString('timecreated');

        $validator
            ->allowEmptyString('timemodified');

        $validator
            ->scalar('aggregationstatus')
            ->maxLength('aggregationstatus', 10)
            ->allowEmptyString('aggregationstatus', false);

        $validator
            ->decimal('aggregationweight')
            ->allowEmptyString('aggregationweight');

        return $validator;
    }
}
