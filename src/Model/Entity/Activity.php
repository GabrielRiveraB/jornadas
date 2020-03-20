<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity
 *
 * @property int $id
 * @property int|null $request_id
 * @property int|null $dependency_id
 * @property int|null $concept_id
 * @property int|null $folio
 * @property string|null $notes
 *
 * @property \App\Model\Entity\Request $request
 * @property \App\Model\Entity\Dependency $dependency
 * @property \App\Model\Entity\Concept $concept
 */
class Activity extends Entity
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
        'dependency_id' => true,
        'concept_id' => true,
        'folio' => true,
        'notes' => true,
        'request' => true,
        'dependency' => true,
        'concept' => true,
    ];
}
