<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Dong Model
 *
 * @method \App\Model\Entity\Dong get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dong newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dong[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dong|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dong patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dong[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dong findOrCreate($search, callable $callback = null, $options = [])
 */
class DongTable extends Table
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

        $this->setTable('dong');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');
        $this->belongsTo('Loai', [
            'foreignKey' => 'loai_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Phankhuc', [
            'foreignKey' => 'dong_id'
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
