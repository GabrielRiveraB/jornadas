<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property int $journey_id
 * @property int $promoter_id
 * @property int|null $concept_id
 * @property int|null $type_id
 * @property int $petitioner_id
 * @property int|null $folio
 * @property string|null $description
 * @property bool|null $sibso
 * @property bool|null $cespt
 * @property bool|null $educacion
 * @property bool|null $municipio
 * @property bool|null $dif
 * @property bool|null $juventud
 * @property string|null $other
 * @property bool|null $gobernador
 * @property int|null $priority
 * @property int|null $request_status_id
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Journey $journey
 * @property \App\Model\Entity\Promoter $promoter
 * @property \App\Model\Entity\Concept $concept
 * @property \App\Model\Entity\Type $type
 * @property \App\Model\Entity\Petitioner $petitioner
 * @property \App\Model\Entity\Requeststatus $request_status
 * @property \App\Model\Entity\Requestupdate[] $requestupdates
 */
class Request extends Entity
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
        'promoter' => true,
        // 'concept_id' => true,
        'type_id' => true,
        'petitioner_id' => true,
        'folio' => true,
        'description' => true,
        'sibso' => true,
        'cespt' => true,
        'educacion' => true,
        'municipio' => true,
        'dif' => true,
        'juventud' => true,
        'other' => true,
        'gobernador' => true,
        'priority' => true,
        'request_status_id' => true,
        'created' => true,
        'modified' => true,
        'journey' => true,
        'promoter' => true,
        'concept' => true,
        'type' => true,
        'petitioner' => true,
        'request_status' => true,
        'requestupdates' => true,


//Campos de foto de solicitud
        '*' =>true,
        'id' =>true,
        'photo_dir'=> false
    ];
}
