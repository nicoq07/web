<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Factura Entity
 *
 * @property int $id
 * @property int $reserva_id
 * @property float $monto
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $pagado
 *
 * @property \App\Model\Entity\Reserva $reserva
 * @property \App\Model\Entity\FacturaProducto[] $factura_productos
 * @property \App\Model\Entity\Recibo[] $recibos
 * @property \App\Model\Entity\Remito[] $remitos
 */
class Factura extends Entity
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
