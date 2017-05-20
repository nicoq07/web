<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Localidade Entity
 *
 * @property int $id
 * @property int $provincia_id
 * @property int $duracion_viaje
 * @property float $precio
 * @property string $descripcion
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Provincia $provincia
 */
class Localidade extends Entity
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
    	return $this->_properties['descripcion'] . ' ' . $this->_properties['precio'] ;
    }
}