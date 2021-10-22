<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MdlUser Model
 *
 * @method \App\Model\Entity\MdlUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\MdlUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MdlUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MdlUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlUser saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MdlUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MdlUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MdlUser findOrCreate($search, callable $callback = null, $options = [])
 */
class MdlUserTable extends Table
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

        $this->setTable('mdl_user');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Search.Search');

        // Filtro por búsqueda de dni
        $this->searchManager()
            ->value('username');

        $this->belongsToMany('MdlGroups', [
            'joinTable' => 'MdlGroups',
            'through' => 'MdlGroupsMembers',
            'foreignKey' => 'userid',
            'targetForeignKey' => 'groupid',
        ]);
        $this->belongsToMany('MdlGradeItems', [
            'joinTable' => 'MdlGradeItems',
            'through' => 'MdlGradeGrades',
            'foreignKey' => 'userid',
            'targetForeignKey' => 'itemid',
        ]);

        $this->hasMany('MdlAttendanceLog')
            ->setForeignKey('studentid')
            ->setJoinType('INNER');

        $this->hasMany('MdlUserInfoData')
            ->setForeignKey('userid')
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
            ->scalar('auth')
            ->maxLength('auth', 20)
            ->allowEmptyString('auth', false);

        $validator
            ->boolean('confirmed')
            ->allowEmptyString('confirmed', false);

        $validator
            ->boolean('policyagreed')
            ->allowEmptyString('policyagreed', false);

        $validator
            ->boolean('deleted')
            ->allowEmptyString('deleted', false);

        $validator
            ->boolean('suspended')
            ->allowEmptyString('suspended', false);

        $validator
            ->allowEmptyString('mnethostid', false);

        $validator
            ->scalar('username')
            ->maxLength('username', 100)
            ->allowEmptyString('username', false);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmptyString('password', false);

        $validator
            ->scalar('idnumber')
            ->maxLength('idnumber', 255)
            ->allowEmptyString('idnumber', false);

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 100)
            ->allowEmptyString('firstname', false);

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 100)
            ->allowEmptyString('lastname', false);

        $validator
            ->email('email')
            ->allowEmptyString('email', false);

        $validator
            ->boolean('emailstop')
            ->allowEmptyString('emailstop', false);

        $validator
            ->scalar('icq')
            ->maxLength('icq', 15)
            ->allowEmptyString('icq', false);

        $validator
            ->scalar('skype')
            ->maxLength('skype', 50)
            ->allowEmptyString('skype', false);

        $validator
            ->scalar('yahoo')
            ->maxLength('yahoo', 50)
            ->allowEmptyString('yahoo', false);

        $validator
            ->scalar('aim')
            ->maxLength('aim', 50)
            ->allowEmptyString('aim', false);

        $validator
            ->scalar('msn')
            ->maxLength('msn', 50)
            ->allowEmptyString('msn', false);

        $validator
            ->scalar('phone1')
            ->maxLength('phone1', 20)
            ->allowEmptyString('phone1', false);

        $validator
            ->scalar('phone2')
            ->maxLength('phone2', 20)
            ->allowEmptyString('phone2', false);

        $validator
            ->scalar('institution')
            ->maxLength('institution', 255)
            ->allowEmptyString('institution', false);

        $validator
            ->scalar('department')
            ->maxLength('department', 255)
            ->allowEmptyString('department', false);

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmptyString('address', false);

        $validator
            ->scalar('city')
            ->maxLength('city', 120)
            ->allowEmptyString('city', false);

        $validator
            ->scalar('country')
            ->maxLength('country', 2)
            ->allowEmptyString('country', false);

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
            ->scalar('timezone')
            ->maxLength('timezone', 100)
            ->allowEmptyString('timezone', false);

        $validator
            ->allowEmptyString('firstaccess', false);

        $validator
            ->allowEmptyString('lastaccess', false);

        $validator
            ->allowEmptyString('lastlogin', false);

        $validator
            ->allowEmptyString('currentlogin', false);

        $validator
            ->scalar('lastip')
            ->maxLength('lastip', 45)
            ->allowEmptyString('lastip', false);

        $validator
            ->scalar('secret')
            ->maxLength('secret', 15)
            ->allowEmptyString('secret', false);

        $validator
            ->allowEmptyString('picture', false);

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->allowEmptyString('url', false);

        $validator
            ->scalar('description')
            ->maxLength('description', 4294967295)
            ->allowEmptyString('description');

        $validator
            ->allowEmptyString('descriptionformat', false);

        $validator
            ->boolean('mailformat')
            ->allowEmptyString('mailformat', false);

        $validator
            ->boolean('maildigest')
            ->allowEmptyString('maildigest', false);

        $validator
            ->allowEmptyString('maildisplay', false);

        $validator
            ->boolean('autosubscribe')
            ->allowEmptyString('autosubscribe', false);

        $validator
            ->boolean('trackforums')
            ->allowEmptyString('trackforums', false);

        $validator
            ->allowEmptyString('timecreated', false);

        $validator
            ->allowEmptyString('timemodified', false);

        $validator
            ->allowEmptyString('trustbitmask', false);

        $validator
            ->scalar('imagealt')
            ->maxLength('imagealt', 255)
            ->allowEmptyFile('imagealt');

        $validator
            ->scalar('lastnamephonetic')
            ->maxLength('lastnamephonetic', 255)
            ->allowEmptyString('lastnamephonetic');

        $validator
            ->scalar('firstnamephonetic')
            ->maxLength('firstnamephonetic', 255)
            ->allowEmptyString('firstnamephonetic');

        $validator
            ->scalar('middlename')
            ->maxLength('middlename', 255)
            ->allowEmptyString('middlename');

        $validator
            ->scalar('alternatename')
            ->maxLength('alternatename', 255)
            ->allowEmptyString('alternatename');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
    public function findLimitRows(Query $query, array $options)
    {

        $query->select(['id', 'username', 'firstname', 'lastname', 'email', 'phone1', 'address', 'city', 'country'])
            ->select($this->MdlGroupsMembers)
            ->contain(['MdlGradeItems']);
        return $query;
    }

    public function findMiembros(Query $query, array $options)
    {
        $query->select(['id', 'firstname', 'lastname', 'email', 'phone1', 'address', 'city', 'country'])
        ->select($this->MdlGroupsMembers);
    return $query;
    }
}
