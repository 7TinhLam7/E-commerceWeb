<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;
use Cake\I18n\Time;

/**
 * Sanpham Model
 *
 * @property \App\Model\Table\BinhluanTable|\Cake\ORM\Association\HasMany $Binhluan
 *
 * @method \App\Model\Entity\Sanpham get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sanpham newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sanpham[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sanpham patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham findOrCreate($search, callable $callback = null, $options = [])
 */ 
class SanphamTable extends Table
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

        $this->setTable('sanpham');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');

        $this->hasMany('Sanphamcc', [
            'foreignKey' => 'sanpham_id'
        ]);
        $this->hasMany('Binhluan', [
            'foreignKey' => 'sanpham_id'
        ]);
        $this->hasMany('Danhgia', [
            'foreignKey' => 'sanpham_id'
        ]);
         $this->belongsTo('Hangsx', [
            'foreignKey' => 'hangsx_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Tag', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);  
         

        $this->belongsTo('Phankhuc', [
            'foreignKey' => 'phankhuc_id',
            'joinType' => 'INNER'
        ]);
 
        $this->belongsTo('Mau', [
            'foreignKey' => 'mau_id',
            'joinType' => 'INNER'
        ]); 
        
        $this->belongsToMany('Users', [
        'joinTable' =>  'binhluan',
        'foreignKey' => 'sanpham_id',
        'targetKey' => 'users_id'
        ]);
        $this->belongsToMany('Nhacc', [
        'joinTable' =>  'sanphamcc',
        'foreignKey' => 'sanpham_id',
        'targetKey' => 'nhacc_id'
        ]);
        // $this->belongsToMany('Users', [
        // 'joinTable' =>  'danhgia',
        // 'foreignKey' => 'sanpham_id',
        // 'targetKey' => 'users_id'
        // ]);
        $this->belongsToMany('Diemdg', [
        'joinTable' =>  'danhgia',
        'foreignKey' => 'sanpham_id',
        'targetKey' => 'diemdg_id'
        ]);
        
        
         


        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'hinhsp' => [
                'fields' => [
                    'dir' => 'hinhsp_dd',
                    // 'size' => 'photo_size',
                    'type' => 'hinhsp_kieu'
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
            ->requirePresence('ten', 'create')
            ->notEmpty('ten');
            
        $validator
            ->requirePresence('hinhsp', 'create')
            ->allowEmpty('hinhsp');
            

         $validator
            ->requirePresence('thongtin', 'create')
            ->notEmpty('thongtin');

        return $validator;
    }


   public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['ten'],'Tên Sản Phẩm Đã Tồn Tại'));
        

        return $rules;
    }


    

     
}
