<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemImgs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\ItemImg get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemImg newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemImg[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemImg|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemImg patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemImg[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemImg findOrCreate($search, callable $callback = null)
 */
class ItemImgsTable extends Table
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

        $this->table('item_imgs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('item_url', 'create')
            ->notEmpty('item_url');

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
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
