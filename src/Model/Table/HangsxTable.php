<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Hangsx Model
 *
 * @method \App\Model\Entity\Hangsx get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hangsx newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hangsx[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hangsx|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hangsx patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hangsx[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hangsx findOrCreate($search, callable $callback = null, $options = [])
 */
class HangsxTable extends Table
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

        $this->setTable('hangsx');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');

         $this->hasMany('Sanpham', [
            'foreignKey' => 'hangsx_id'
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
