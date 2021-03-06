<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Telefono Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $tipo_telefono_id
 * @property string $numero
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Users $user
 * @property \App\Model\Entity\TipoTelefono $tipo_telefono
 */
class Telefono extends Entity
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
