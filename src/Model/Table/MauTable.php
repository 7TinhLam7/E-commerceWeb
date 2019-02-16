<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;

/**
 * Mau Model
 *
 * @property \App\Model\Table\SanphamTable|\Cake\ORM\Association\HasMany $Sanpham
 *
 * @method \App\Model\Entity\Mau get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mau newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mau[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mau|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mau patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mau[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mau findOrCreate($search, callable $callback = null, $options = [])
 */
class MauTable extends Table
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

        $this->setTable('mau');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');

        $this->hasMany('Sanpham', [
            'foreignKey' => 'mau_id'
        ]);
        

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'hinhm' => [
                'fields' => [
                    'dir' => 'hinhm_dd',
                    // 'size' => 'photo_size',
                    'type' => 'hinhm_kieu'
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
            ->requirePresence('hinhm', 'create')
            ->allowEmpty('hinhm');

        
        return $validator;
    }
}
