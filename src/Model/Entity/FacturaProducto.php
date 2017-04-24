<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FacturaProducto Entity
 *
 * @property int $id
 * @property int $producto_id
 * @property int $factura_id
 * @property int $cantidad
 * @property float $precio
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Producto $producto
 * @property \App\Model\Entity\Factura $factura
 */
class FacturaProducto extends Entity
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
