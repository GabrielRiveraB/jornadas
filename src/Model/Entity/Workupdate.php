<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workupdate Entity
 *
 * @property int $id
 * @property int|null $work_id
 * @property string|null $name
 * @property string|null $type
 *
 * @property \App\Model\Entity\Work $work
 */
class Workupdate extends Entity
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
        'work_id' => true,
        'name' => true,
        'type' => true,
        'work' => true,
    ];
}
