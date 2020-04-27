<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requestupdate Entity
 *
 * @property int $id
 * @property int|null $request_id
 * @property string|null $description
 *
 * @property \App\Model\Entity\Request $request
 */
class Requestupdate extends Entity
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
        'request_id' => true,
        'activity_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
    ];
}
