<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Envio Entity
 *
 * @property int $id
 * @property int $remito_id
 * @property int $reserva_id
 * @property int $domicilio_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Remito $remito
 * @property \App\Model\Entity\Reserva $reserva
 * @property \App\Model\Entity\Domicilio $domicilio
 */
class Envio extends Entity
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
