<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlEnrol Model
 *
 * @method \App\Model\Entity\MdlEnrol get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlEnrol newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlEnrol[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlEnrol|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlEnrol saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlEnrol patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlEnrol[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlEnrol findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlEnrolTable extends Table
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

        $this->setTable('mdl_enrol');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('MdlUserEnrolments')
            ->setForeignKey('enrolid')
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
            ->scalar('enrol')
            ->maxLength('enrol', 20)
            ->allowEmptyString('enrol', false);

        $validator
            ->allowEmptyString('status', false);

        $validator
            ->requirePresence('courseid', 'create')
            ->allowEmptyString('courseid', false);

        $validator
            ->allowEmptyString('sortorder', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        $validator
            ->allowEmptyString('enrolperiod');

        $validator
            ->allowEmptyString('enrolstartdate');

        $validator
            ->allowEmptyString('enrolenddate');

        $validator
            ->boolean('expirynotify')
            ->allowEmptyString('expirynotify');

        $validator
            ->allowEmptyString('expirythreshold');

        $validator
            ->boolean('notifyall')
            ->allowEmptyString('notifyall');

        $validator
            ->scalar('password')
            ->maxLength('password', 50)
            ->allowEmptyString('password');

        $validator
            ->scalar('cost')
            ->maxLength('cost', 20)
            ->allowEmptyString('cost');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 3)
            ->allowEmptyString('currency');

        $validator
            ->allowEmptyString('roleid');

        $validator
            ->allowEmptyString('customint1');

        $validator
            ->allowEmptyString('customint2');

        $validator
            ->allowEmptyString('customint3');

        $validator
            ->allowEmptyString('customint4');

        $validator
            ->allowEmptyString('customint5');

        $validator
            ->allowEmptyString('customint6');

        $validator
            ->allowEmptyString('customint7');

        $validator
            ->allowEmptyString('customint8');

        $validator
            ->scalar('customchar1')
            ->maxLength('customchar1', 255)
            ->allowEmptyString('customchar1');

        $validator
            ->scalar('customchar2')
            ->maxLength('customchar2', 255)
            ->allowEmptyString('customchar2');

        $validator
            ->scalar('customchar3')
            ->maxLength('customchar3', 1333)
            ->allowEmptyString('customchar3');

        $validator
            ->decimal('customdec1')
            ->allowEmptyString('customdec1');

        $validator
            ->decimal('customdec2')
            ->allowEmptyString('customdec2');

        $validator
            ->scalar('customtext1')
            ->maxLength('customtext1', 4294967295)
            ->allowEmptyString('customtext1');

        $validator
            ->scalar('customtext2')
            ->maxLength('customtext2', 4294967295)
            ->allowEmptyString('customtext2');

        $validator
            ->scalar('customtext3')
            ->maxLength('customtext3', 4294967295)
            ->allowEmptyString('customtext3');

        $validator
            ->scalar('customtext4')
            ->maxLength('customtext4', 4294967295)
            ->allowEmptyString('customtext4');

        $validator
            ->allowEmptyString('timecreated', false);

        $validator
            ->allowEmptyString('timemodified', false);

        return $validator;
    }
}
