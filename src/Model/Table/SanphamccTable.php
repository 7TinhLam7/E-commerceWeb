<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * sanphamcc Model
 *
 * @property \App\Model\Table\SanphamsTable|\Cake\ORM\Association\BelongsTo $Sanphams
 * @property \App\Model\Table\NhaccsTable|\Cake\ORM\Association\BelongsTo $Nhaccs
 *
 * @method \App\Model\Entity\sanphamcc get($primaryKey, $options = [])
 * @method \App\Model\Entity\sanphamcc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\sanphamcc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\sanphamcc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\sanphamcc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\sanphamcc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\sanphamcc findOrCreate($search, callable $callback = null, $options = [])
 */
class sanphamccTable extends Table
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

        $this->setTable('sanphamcc');

        $this->belongsTo('Sanpham', [
            'foreignKey' => 'sanpham_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Nhacc', [
            'foreignKey' => 'nhacc_id',
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
            ->requirePresence('gia', 'create')
            ->notEmpty('gia');

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
        $rules->add($rules->existsIn(['sanpham_id'], 'Sanpham'));
        $rules->add($rules->existsIn(['nhacc_id'], 'Nhacc'));

        return $rules;
    }
}
