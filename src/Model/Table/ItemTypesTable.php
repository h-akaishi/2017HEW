<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Items
 *
 * @method \App\Model\Entity\ItemType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItemType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItemType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItemType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItemType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItemType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItemType findOrCreate($search, callable $callback = null)
 */
class ItemTypesTable extends Table
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

        $this->table('item_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Items', [
            'foreignKey' => 'item_type_id'
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
            ->requirePresence('type_name', 'create')
            ->notEmpty('type_name');

        return $validator;
    }
}
