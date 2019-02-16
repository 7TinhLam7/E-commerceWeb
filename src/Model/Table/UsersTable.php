<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;


/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\BinhluanTable|\Cake\ORM\Association\HasMany $Binhluan
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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

        $this->setTable('users');
        $this->setDisplayField('hoten');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'roles_id',
            'joinType' => 'INNER'
        ]);
        
        $this->hasMany('Binhluan', [
            'foreignKey' => 'users_id',
            'dependent' => true,
    'cascadeCallbacks' => true,

        ]);

        $this->hasMany('Lienhe', [
            'foreignKey' => 'users_id'
        ]);

        $this->hasMany('Danhgia', [
            'foreignKey' => 'users_id',
            'dependent' => true,
    'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Lienhe', [
            'foreignKey' => 'users_id',
            'dependent' => true,
    'cascadeCallbacks' => true,
        ]);

        $this->hasMany('Tag', [
            'foreignKey' => 'idnguoitao'
        ]);


        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'hinhuser' => [
                'fields' => [
                    'dir' => 'hinhuser_dd',
                    // 'size' => 'photo_size',
                    // 'type' => 'hinhuser_kieu'
                ],
                'nameCallback' => function ($data, $settings) {
                   $time = Time::now();
                   $time->timezone = 'Asia/Ho_Chi_Minh';
                   $time= str_replace(array(' ','/',':','_',','),array(''),$time);
                
                    return  $time.strtolower($data['name']);
                },
                // 'transformer' =>  function ($table, $entity, $data, $field, $settings) {
                //     $extension = pathinfo($data['name'], PATHINFO_EXTENSION);

                //     // Store the thumbnail in a temporary file
                //     $tmp = tempnam(sys_get_temp_dir(), 'upload') . '.' . $extension;

                //     // Use the Imagine library to DO THE THING
                //     $size = new \Imagine\Image\Box(40, 40);
                //     $mode = \Imagine\Image\ImageInterface::THUMBNAIL_INSET;
                //     $imagine = new \Imagine\Gd\Imagine();

                //     // Save that modified file to our temp file
                //     $imagine->open($data['tmp_name'])
                //         ->thumbnail($size, $mode)
                //         ->save($tmp);

                //     // Now return the original *and* the thumbnail
                //     return [
                //         $data['tmp_name'] => $data['name'],
                //         $tmp => 'thumbnail-' . $data['name'],
                //     ];
                // },
                'deleteCallback' => function ($path, $entity, $field, $settings) {
                    // When deleting the entity, both the original and the thumbnail will be removed
                    // when keepFilesOnDelete is set to false
                    return [
                        $path . $entity->{$field},
                        $path . 'thumbnail-' . $entity->{$field}
                    ];
                },
                'keepFilesOnDelete' => false
            ]
        
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
            ->requirePresence('ho', 'create')
            ->notEmpty('ho', 'Xin Hãy Nhập Họ')
            ->lengthBetween('ho', [1, 8], 'độ dài 1 tới 8');    


        $validator
            ->requirePresence('ten', 'create')
            ->notEmpty('ten', 'Xin Hãy Nhập Tên')
            ->lengthBetween('ten', [1, 8], 'độ dài 1 tới 8');

        $validator
            ->email('email','Sai cú pháp email')
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'Xin Hãy Nhập Email');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password','Xin Hãy Nhập Password')
            ->add('password',[
             'length' => [
            'rule' => ['minLength',5 ],
            'message' => 'Ít nhất 5 ký tự',
        ]
    ]);

        $validator
            ->boolean('gioitinh')
            ->notEmpty('gioitinh');

        $validator
            ->requirePresence('sdt', 'create')
            ->notEmpty('sdt','Xin Hãy Nhập Số Điện Thoại')
            ->lengthBetween('sdt', [11,11], 'Số điện thoại không hợp lệ (11 số)');
              
        $validator
            ->notEmpty('diachi')
            ->add('diachi',[
             'length' => [
            'rule' => ['minLength',5 ],
            'message' => 'Ít nhất 5 ký tự',
        ]
    ]);

        

        $validator
            ->allowEmpty('hinhuser');    

        

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
        // $rules->add($rules->isUnique(['sdt']));
        $rules->add($rules->isUnique(['email'],'Email đã được sử dụng'));
        // $rules->add($rules->existsIn(['roles_id'], 'Roles'));

        return $rules;
    }
}
