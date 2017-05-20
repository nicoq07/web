<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Domicilio Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $piso
 * @property string $numero
 * @property string $direccion
 * @property int $localidad_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Localidade $localidade
 * @property \App\Model\Entity\Envio[] $envios
 */
class Domicilio extends Entity
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
    
    protected function _getPresentacion()
    {
    	return $this->_properties['direccion'] . ' ' . $this->_properties['numero'] . ' ' . $this->_properties['piso'] . '- ' ;
    }
}
