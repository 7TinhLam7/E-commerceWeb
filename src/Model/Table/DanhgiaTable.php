<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Danhgia Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SanphamsTable|\Cake\ORM\Association\BelongsTo $Sanphams
 * @property \App\Model\Table\DiemdgsTable|\Cake\ORM\Association\BelongsTo $Diemdgs
 *
 * @method \App\Model\Entity\Danhgium get($primaryKey, $options = [])
 * @method \App\Model\Entity\Danhgium newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Danhgium[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Danhgium|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Danhgium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Danhgium[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Danhgium findOrCreate($search, callable $callback = null, $options = [])
 */
class DanhgiaTable extends Table
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

        $this->setTable('danhgia');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sanpham', [
            'foreignKey' => 'sanpham_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Diemdg', [
            'foreignKey' => 'diemdg_id',
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    
}
