<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Lienhe Model
 *
 * @method \App\Model\Entity\Lienhe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lienhe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lienhe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lienhe|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lienhe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lienhe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lienhe findOrCreate($search, callable $callback = null, $options = [])
 */
class LienheTable extends Table
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

        $this->setTable('lienhe');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
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
            ->email('email','Sai cú pháp email')
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'Xin Hãy Nhập Email');
        $validator
            ->requirePresence('sdt', 'create')
            ->notEmpty('sdt','Xin Hãy Nhập Số Điện Thoại')
            ->lengthBetween('sdt', [11,11], 'Số Điện Thoại Không Hợp Lệ (11 số)');    

        $validator
            ->requirePresence('noidung', 'create')
            ->notEmpty('noidung','Vui Lòng Nhập Nội Dung');

        $validator
            ->dateTime('tgtao')
            ->requirePresence('tgtao', 'create')
            ->notEmpty('tgtao');

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
        // $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
