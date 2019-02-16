<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nhom Model
 *
 * @method \App\Model\Entity\Nhom get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nhom newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nhom[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nhom|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nhom patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nhom[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nhom findOrCreate($search, callable $callback = null, $options = [])
 */
class NhomTable extends Table
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

        $this->setTable('nhom');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');

        $this->hasMany('Loai', [
            'foreignKey' => 'nhom_id'
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
            ->requirePresence('ten', 'create')
            ->notEmpty('ten');

        return $validator;
    }
} 
