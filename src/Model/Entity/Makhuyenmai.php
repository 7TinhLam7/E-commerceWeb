<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Makhuyenmai Entity
 *
 * @property int $id
 * @property string $ma
 * @property int $khuyenmai_id
 *
 * @property \App\Model\Entity\Khuyenmai $khuyenmai
 */
class Makhuyenmai extends Entity
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
