<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Journey Entity
 *
 * @property int $id
 * @property string|null $municipio
 * @property \Cake\I18n\FrozenDate|null $date
 * @property \Cake\I18n\FrozenTime|null $horainicio
 * @property \Cake\I18n\FrozenTime|null $horatermino
 * @property |null $photo
 * @property string|null $photo_dir
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Request[] $requests
 */
class Journey extends Entity
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
        'municipio' => true,
        'ubicacion' => true,
        'date' => true,
        'horainicio' => true,
        'horatermino' => true,
        'photo' => true,
        'photo_dir' => true,
        'created' => true,
        'modified' => true,
        'requests' => true,
    ];
}
