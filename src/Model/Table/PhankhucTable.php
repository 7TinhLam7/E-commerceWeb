<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Phankhuc Model
 *
 * @property \App\Model\Table\DongTable|\Cake\ORM\Association\BelongsTo $Dong
 * @property \App\Model\Table\SanphamTable|\Cake\ORM\Association\HasMany $Sanpham
 *
 * @method \App\Model\Entity\Phankhuc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phankhuc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phankhuc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phankhuc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phankhuc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phankhuc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phankhuc findOrCreate($search, callable $callback = null, $options = [])
 */
class PhankhucTable extends Table
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

        $this->setTable('phankhuc');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dong', [
            'foreignKey' => 'dong_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Sanpham', [
            'foreignKey' => 'phankhuc_id'
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['dong_id'], 'Dong'));

        return $rules;
    }
}
