<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Producto Entity
 *
 * @property int $id
 * @property int $rango_edad_id
 * @property int $categoria_id
 * @property string $descripcion
 * @property string $informacion
 * @property string $dimensiones
 * @property float $precio
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\RangoEdade $rango_edade
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\CalificacionesProducto[] $calificaciones_productos
 * @property \App\Model\Entity\FacturaProducto[] $factura_productos
 * @property \App\Model\Entity\FotosProducto[] $fotos_productos
 * @property \App\Model\Entity\Reserva[] $reservas
 */
class Producto extends Entity
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
