<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * TarjetasCreditoUser Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $numero
 * @property string $marca
 * @property int $vencimientoMes
 * @property int $vencimientoAnio
 * @property string $codSeguridad
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\User $user
 */
class TarjetasCreditoUser extends Entity
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
    protected function _setNumero($value)
    {
    	if (!empty($value))
    	{
    		$hasher = new DefaultPasswordHasher();
    		return $hasher->hash($value);
    	}
    	else
    	{
    		$id = $this->_properties['id'];
    		$tarjetaCreditoUser = TableRegistry::get('TarjetasCreditoUser')->recoverPassword($id);
    		return $tarjetaCreditoUser;
    	}
    }
    
    protected function _setcodSeguridad($value)
    {
    	if (!empty($value))
    	{
    		$hasher = new DefaultPasswordHasher();
    		return $hasher->hash($value);
    	}
    	else
    	{
    		$id = $this->_properties['id'];
    		$tarjetaCreditoUser = TableRegistry::get('TarjetasCreditoUser')->recoverPassword($id);
    		return $tarjetaCreditoUser;
    	}
    }
    protected function _getPresentacion()
    {
        /*$direccion = $this->_properties['direccion'] . ' ' . $this->_properties['numero'];
        if ($this->_properties['piso']) {
            $direccion = $direccion . ' ' . $this->_properties['piso'];
        }
        $direccion = $direccion . ', ';*/
        $numero = (string)$this->_properties['numero'];
        $ultimosCuatro = substr($numero, -4);
        return $this->_properties['marca'].", XXXX-XXXX-XXXX-".$ultimosCuatro;
    }
    
    
    protected function _getNum()
    {
    	/*$direccion = $this->_properties['direccion'] . ' ' . $this->_properties['numero'];
    	 if ($this->_properties['piso']) {
    	 $direccion = $direccion . ' ' . $this->_properties['piso'];
    	 }
    	 $direccion = $direccion . ', ';*/
    	$numero = (string)$this->_properties['numero'];
    	$ultimosCuatro = substr($numero, -4);
    	return "XXXX-XXXX-XXXX-".$ultimosCuatro;
    }
}
