<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\I18n\Date;

/**
 * Reserva Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $estado_reserva_id
 * @property \Cake\I18n\Time $fecha_inicio
 * @property \Cake\I18n\Time $fecha_fin
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\ReservasProducto[] $reservas_productos
 * @property \App\Model\Entity\Producto[] $productos
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EstadosReserva $estados_reserva
 * @property \App\Model\Entity\Envio[] $envios
 * @property \App\Model\Entity\Factura[] $facturas
 * @property \App\Model\Entity\PagosReserva[] $pagos_reserva
 */
class Reserva extends Entity
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
    
    
    public function isCancelable(){
    	$fecha = $this->_properties['fecha_inicio'];
    	$hoy = new Date("now");
    	$hoy->format('Y-m-d');
    	$fecha = $fecha->format("Y-m-d");
    	$inicio = new Date($fecha);
    	$diferencia = date_diff($inicio, $hoy);
    	
    	if ($diferencia->d < 3) {
    		return false;
    	}
    	
    	return true;
    }
}
