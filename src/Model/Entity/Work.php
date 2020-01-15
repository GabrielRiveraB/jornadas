<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Work Entity
 *
 * @property int $id
 * @property int $journey_id
 * @property string $name
 * @property string $description
 * @property string|null $responsables
 * @property string $folio
 * @property \Cake\I18n\FrozenDate|null $fecha_compromiso
 * @property \Cake\I18n\FrozenDate|null $start
 * @property \Cake\I18n\FrozenDate|null $end
 * @property float|null $cost
 * @property int|null $completed
 * @property int|null $paid
 * @property int|null $workStatus_id
 * @property float|null $latitude
 * @property float|null $longitude
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Journey $journey
 * @property \App\Model\Entity\Workstatus $work_status
 */
class Work extends Entity
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
        'journey_id' => true,
        'name' => true,
        'description' => true,
        'responsables' => true,
        'folio' => true,
        'fecha_compromiso' => true,
        'start' => true,
        'end' => true,
        'cost' => true,
        'completed' => true,
        'paid' => true,
        'workStatus_id' => true,
        'latitude' => true,
        'longitude' => true,
        'created' => true,
        'modified' => true,
        'journey' => true,
        'work_status' => true,
    ];
}
