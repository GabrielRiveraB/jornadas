<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Promoter Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $position
 * @property int|null $dependency_id
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 * @property \Cake\I18n\FrozenDate|null $ubicacion
 * @property bool|null $status
 */
class Promoter extends Entity
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
        'name' => true,
        'position' => true,
        'dependency_id' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
    ];
}
