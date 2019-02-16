<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\I18n\Time;
/**
 * Nhacc Model
 *
 * @property \App\Model\Table\SanphamTable|\Cake\ORM\Association\HasMany $Sanpham
 *
 * @method \App\Model\Entity\Nhacc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nhacc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nhacc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nhacc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nhacc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nhacc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nhacc findOrCreate($search, callable $callback = null, $options = [])
 */
class NhaccTable extends Table
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

        $this->setTable('nhacc');
        $this->setDisplayField('ten');
        $this->setPrimaryKey('id');

        $this->hasMany('sanphamcc', [
            'foreignKey' => 'nhacc_id'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'hinhcc' => [
                'fields' => [
                    'dir' => 'hinhcc_dd',
                    
                    
                ],
                // 'path' => 'static{DS}{model}{DS}{field}{DS}{primaryKey}',
                'nameCallback' => function ($data, $settings) {
                    $time = Time::now();
            $time->timezone = 'Asia/Ho_Chi_Minh';
            $time= str_replace(array(' ','/',':','_',','),array(''),$time);
                    return $time.strtolower($data['name']);
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
            ->requirePresence('diachi', 'create')
            ->notEmpty('diachi');
        $validator
            ->requirePresence('sdt', 'create')
            ->notEmpty('sdt');
        $validator
            ->requirePresence('hinhcc', 'create')
            ->allowEmpty('hinhcc');    


          

        return $validator;
    }
}
