<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('sei_name');

        $validator
            ->allowEmpty('mei_name');

        $validator
            ->allowEmpty('sei_kana');

        $validator
            ->allowEmpty('mei_kana');

        $validator
            ->allowEmpty('user_sex');

        $validator
            ->date('birth')
            ->allowEmpty('birth');

        $validator
            ->allowEmpty('mail_no');

        $validator
            ->allowEmpty('mail_add');

        $validator
            ->allowEmpty('user_tel');

        $validator
            ->requirePresence('user_mail', 'create')
            ->notEmpty('user_mail');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('rule');

        return $validator;
    }
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['user_mail'], '既に存在するメールアドレスです'));

        return $rules;
    }
}
