<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PagosMulta Entity
 *
 * @property int $id
 * @property int $multas_user_id
 * @property int $medio_pago_id
 * @property float $monto
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $pagado
 *
 * @property \App\Model\Entity\MultasUser $multas_user
 * @property \App\Model\Entity\MediosPago $medios_pago
 */
class PagosMulta extends Entity
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
