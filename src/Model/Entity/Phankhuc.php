<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Phankhuc Entity
 *
 * @property int $id
 * @property string $ten
 * @property int $dong_id
 *
 * @property \App\Model\Entity\Dong $dong
 * @property \App\Model\Entity\Sanpham[] $sanpham
 */
class Phankhuc extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
