<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $password
 * @property int $rol_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\CalificacionesProducto[] $calificaciones_productos
 * @property \App\Model\Entity\Domicilio[] $domicilios
 * @property \App\Model\Entity\MultasUser[] $multas_user
 * @property \App\Model\Entity\PagosReserva[] $pagos_reserva
 * @property \App\Model\Entity\Reserva[] $reservas
 * @property \App\Model\Entity\Telefono[] $telefonos
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
