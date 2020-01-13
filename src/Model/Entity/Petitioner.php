<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Petitioner Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $age
 * @property string|null $civilstatus
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property \Cake\I18n\FrozenDate|null $created
 * @property \Cake\I18n\FrozenDate|null $modified
 *
 * @property \App\Model\Entity\Request[] $requests
 */
class Petitioner extends Entity
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
        'age' => true,
        'civilstatus' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'requests' => true,
    ];
}
