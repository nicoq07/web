<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;

/**
 * Reservas Controller
 *
 * @property \App\Model\Table\ReservasTable $Reservas
 */
class ReservasController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == CLIENTE)
		{
			if(in_array($this->request->action, ['add', 'index', 'view', 'guardarProductos', 'guardarFactura', 'guardarFacturaProductos', 'guardarEnvio', 'actualizarEnvio', 'calcularHoras', 'actualizarTabla', 'bajaCarro', 'contarProductos', 'ValidarReserva', 'cancelar', 'isCancelable', 'mailCancelacion', 'actualizarTablaProductos']))
			{
				return true;
			}            
		}
		elseif (isset($user['rol_id']) && ($user['rol_id'] == EMPLEADO || $user['rol_id'] == ADMINISTRADOR)) {
			if(in_array($this->request->action, ['index', 'view', 'enviarMail']))
            {
                return true;
            }
		}
		
		return parent::isAuthorized($user);
		
		return true;
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $where = null;
        if (!(empty($this->request->getData()['idlistuser'])))
        {
            $userid=$this->request->getData()['idlistuser'];
            $where = ['reservas.user_id' => $userid];
        }
        $where2 = null;
        if (!(empty($this->request->getData()['estado_reserva_id'])))
        {
            $estadoid=$this->request->getData()['estado_reserva_id'];
            $where2 = ['reservas.estado_reserva_id' => $estadoid];
        }
        $where3 = null;
        if (!(empty($this->request->getData()['fecha'])))
        {
            $fechafiltro=$this->request->getData()['fecha'];
            $where3 = ['"'.$fechafiltro.'" BETWEEN DATE(reservas.fecha_inicio) AND DATE(reservas.fecha_fin)'];
        }

        $where4 = null;

        if(!(empty($this->Auth->user()['id'])) && ($this->Auth->user()['rol_id'] != ADMINISTRADOR && $this->Auth->user()['rol_id'] != EMPLEADO))
        {
            $userid=$this->Auth->user()['id'];
            $where4 = ['reservas.user_id' => $userid];
        }

        $this->paginate = [
            'contain' => ['Users', 'EstadosReservas'],
            'conditions' => [$where, $where2, $where3, $where4]
        ];
        $users = $this->Reservas->Users->find('all', ['limit' => 200]);
        $reservas = $this->paginate($this->Reservas);
        $estados = $this->Reservas->EstadosReservas->find('list', ['limit' => 200]);
        $this->set(compact('reservas', 'estados', 'users'));
        $this->set('_serialize', ['reservas']);
    }

    /**
     * View method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserva = $this->Reservas->get($id, [
            'contain' => ['Users', 'EstadosReservas', 'Productos', 'Envios', 'Facturas', 'PagosReserva']
        ]);
        $recibos = $this->Reservas->Facturas->Recibos->find()->where(['factura_id =' => $reserva->facturas[0]->id]);
        $domicilio = $this->Reservas->Envios->Domicilios->get($reserva->envios[0]->domicilio_id);
        $localidad = $this->Reservas->Envios->Domicilios->Localidades->get($domicilio->localidad_id);

        foreach ($reserva->productos as $producto) {
            $producto->rango_edad_id = $this->Reservas->ReservasProductos->Productos->RangoEdades->get($producto->rango_edad_id);
            $producto->categoria_id = $this->Reservas->ReservasProductos->Productos->Categorias->get($producto->categoria_id);
        }

        $this->set('reserva', $reserva);
        $this->set('recibos', $recibos);
        $this->set('domicilio', $domicilio);
        $this->set('localidad', $localidad);
        $this->set('_serialize', ['reserva']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {      
        $session = $this->request->session();

        $productos = array();
        $cantidad = array();
        $session = $this->request->session();
        $allProducts = $session->read('cart');
        if (null!=$allProducts) {
            foreach ($allProducts as $id => $count) {
                $producto = $this->Reservas->Productos->get($id);
                $productos[]=$producto;
                $cantidad[]=$count;
            }
        }

        $reserva = $this->Reservas->newEntity();
        if ($this->request->is('post')) {
            $tarjeta = $this->Reservas->Users->TarjetasCreditoUser->get($this->request->getData()['tarjeta_id']);
            if ($tarjeta->vencimientoMes != $this->request->getData()['vencimientoMes'] || $tarjeta->vencimientoAnio != $this->request->getData()['vencimientoAnio'] || $tarjeta->codSeguridad != $this->request->getData()['codSeguridad']) {
                $this->Flash->error(__('Los datos de la tarjeta son incorrectos. Intente nuevamente.'));
                return $this->redirect(['action' => 'add']);
            }
            /*debug($this->request->getData());
            exit();*/

            $tiempoEnvio = $this->request->getData()['tiempoEnvio'];
            if ($tiempoEnvio%60 == 0) {
                $tiempoEnvio = $tiempoEnvio/60;
            } else {
                $tiempoEnvio = floor($tiempoEnvio/60)+1;                
            }
            /*debug($tiempoEnvio);
            exit();*/

            $fechaIni =  $this->request->getData()['fecha_inicio'];
            $fechaFin =  $this->request->getData()['fecha_fin'];
            $horaIni =  $this->request->getData()['hora_inicio'];
            $horaFin =  $this->request->getData()['hora_fin'];
            $horas = $this->calcularHoras($fechaIni, $horaIni, $fechaFin, $horaFin);
            $totalReserva =  $this->request->getData()['totalReserva'];
            $horaDisponibilidadInicio = $horaIni - $tiempoEnvio;
            $horaDisponibilidadFin = $horaFin + $tiempoEnvio + 1;
            
            if ($horaDisponibilidadFin > 23){
                $horaDisponibilidadFin = 23;
            }

            /*debug($horas);
            debug($totalReserva);
            debug($horaDisponibilidadInicio);
            debug($horaDisponibilidadFin);
            exit();*/

            $disponibilidadInicio = new \DateTime($fechaIni." ".$horaDisponibilidadInicio.":00:00");
            $disponibilidadInicio = date_format($disponibilidadInicio, 'Y/m/d H:i:s');
            $disponibilidadFin = new \DateTime($fechaFin." ".$horaDisponibilidadFin.":00:00");
            $disponibilidadFin = date_format($disponibilidadFin, 'Y/m/d H:i:s');
            
            /*debug($disponibilidadInicio);
            debug($disponibilidadFin);
            exit();*/

            $fechaIni = new \DateTime($fechaIni." ".$horaIni.":00:00");
            $fechaIni = date_format($fechaIni, 'Y/m/d H:i:s');
            $fechaFin = new \DateTime($fechaFin." ".$horaFin.":00:00");
            $fechaFin = date_format($fechaFin, 'Y/m/d H:i:s');            
            
            //Aca se debería evaluar la reserva. 
            $bandera = $this->ValidarReserva($disponibilidadInicio, $disponibilidadFin, $horaDisponibilidadInicio, $horaDisponibilidadFin, $allProducts);
            if($bandera == "false")
            {
                return $this->redirect($this->referer());
            }          
            
            $miReserva = array();
            $miReserva['fecha_fin'] = $fechaFin;
            $miReserva['fecha_inicio'] = $fechaIni;
            $miReserva['no_disponible_fin'] = $disponibilidadFin;
            $miReserva['no_disponible_inicio'] = $disponibilidadInicio;
            $miReserva['estado_reserva_id'] = 1;
            $miReserva['total'] = $totalReserva;            
            $miReserva['user_id'] = $this->viewVars['current_user']['id'];
            $miReserva['active'] = 1; 

            $reserva = $this->Reservas->patchEntity($reserva, $miReserva); 
            
            /*debug($bandera);
            debug($reserva);
            exit();*/

            if ($lastId = $this->Reservas->save($reserva)) {
                $this->guardarProductos($session->read('cart'), $lastId->id);
                $idFactura = $this->guardarFactura($lastId->id, $totalReserva);
                $this->guardarFacturaProductos($idFactura->id, $session->read('cart'), $horas);
                $idEnvio = $this->guardarEnvio($lastId->id, $idFactura->id, $session->read('cart'), $this->request->getData()['domicilio'], $disponibilidadInicio);
                $this->guardarPago($lastId->id);
                $session->delete('cart');
                $this->Flash->success(__('Reserva creada.'));

                return $this->redirect(['controller'=>'reservas', 'action' => 'index']);
            }
            $this->Flash->error(__('Error al cargar la reserva, reintente por favor.'));
            return $this->redirect(['action' => 'add']);
            
        }
        
        $users = $this->Reservas->Users->find('list', ['limit' => 200]);
        $estadosReservas = $this->Reservas->EstadosReservas->find('list', ['limit' => 200]);
        $domicilios = $this->Reservas->Users->Domicilios->find()->where(['user_id =' => $this->viewVars['current_user']['id']]);
        $localidades = $this->Reservas->Users->Domicilios->Localidades->find();
        $mediosPagos = $this->Reservas->PagosReserva->MediosPagos->find('list', ['limit' => 200])->where(['active =' => 1]);
        $tarjetas = $this->Reservas->Users->TarjetasCreditoUser->find('list', ['limit' => 200])->where(['TarjetasCreditoUser.user_id =' => $this->viewVars['current_user']['id'], 'active ='=>1]);
        $this->set(compact('reserva', 'users', 'estadosReservas', 'productos', 'domicilios','localidades', 'cantidad', 'mediosPagos', 'tarjetas'));
        $this->set('_serialize', ['reserva']);
    }

    private function guardarProductos($data, $idReserva)
    {
        if(!empty($data))
        {
            $connection= ConnectionManager::get("default");
            foreach ($data as $id => $cant)
            {                
                $connection->insert('reservas_productos', [
                'reserva_id' => $idReserva,
                'producto_id' => $id,
                'cantidad' => $cant,
                'modified' => new \DateTime('now'),
                'created' => new \DateTime('now')], 
                ['created' => 'datetime' , 'modified' => 'datetime']);
            }      
        }
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    private function guardarFactura($idReserva, $totalReserva){        
        if(!empty($idReserva) && !empty($idReserva)){
            $factura = $this->Reservas->Facturas->newEntity();
            $miFactura = array('reserva_id' => $idReserva, 'monto' => $totalReserva, 'pagado' => 0, 'porcentajePago' => 0, 'active' => 1);
            $factura = $this->Reservas->patchEntity($factura, $miFactura);
            return $this->Reservas->Facturas->save($factura);
        }
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    private function guardarFacturaProductos($idFactura, $productos, $horas)
    {
        if(!empty($productos) && !empty($idFactura) && !empty($horas))
        {
            $connection= ConnectionManager::get("default");
            foreach ($productos as $id => $cant)
            {                
                $producto = $this->Reservas->ReservasProductos->Productos->get($id);
                $connection->insert('factura_productos', [
                'factura_id' => $idFactura,
                'producto_id' => $id,
                'cantidad' => $cant,
                'precio' => $cant * $horas * $producto->precio,
                'modified' => new \DateTime('now'),
                'created' => new \DateTime('now')], 
                ['created' => 'datetime' , 'modified' => 'datetime']);
            }      
        }
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    private function guardarEnvio($idReserva, $idFactura, $productos, $idDomicilio, $fechaEvento){
        if(!empty($idFactura) && !empty($productos) && !empty($idReserva) && !empty($idDomicilio)){
            $cantidadEnvios = 0;
            $cantidadProductos = 0;
            foreach ($productos as $key => $value) {
                $cantidadProductos = $cantidadProductos+$value;
            }
            if ($cantidadProductos%4 == 0) {
                $cantidadEnvios = $cantidadProductos/4;
            } else {
                $cantidadEnvios = floor($cantidadProductos/4)+1;                
            }

            for ($i=0; $i < $cantidadEnvios; $i++) { 
                $remito = $this->Reservas->Facturas->Remitos->newEntity();
                $miRemito = array('factura_id' => $idFactura, 'active' => 1);
                $remito = $this->Reservas->patchEntity($remito, $miRemito);
                $idRemito = $this->Reservas->Facturas->Remitos->save($remito);

                $envio = $this->Reservas->Facturas->Remitos->Envios->newEntity();
                $miEnvio = array('remito_id' => $idRemito->id, 'reserva_id' => $idReserva, 'domicilio_id' => $idDomicilio, 'fecha_evento' => $fechaEvento, 'active' => 1);
                $envio = $this->Reservas->Facturas->Remitos->Envios->patchEntity($envio, $miEnvio);
                $this->Reservas->Facturas->Remitos->Envios->save($envio);
            }            
        }
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    private function guardarPago($idReserva){
        $pagosReserva = $this->Reservas->PagosReserva->newEntity();

        $miPago = array();
        $miPago['reserva_id'] = $idReserva;
        $miPago['tarjeta_id'] = $this->request->getData()['tarjeta_id'];
        $miPago['medio_pago_id'] = $this->request->getData()['medio_pago_id'];
        $miPago['pagado'] = 1;
        $miPago['user_id'] = $this->viewVars['current_user']['id'];

        $pagosReserva = $this->Reservas->PagosReserva->patchEntity($pagosReserva, $miPago);

        if ($this->Reservas->PagosReserva->save($pagosReserva)) {
            $factura = $this->Reservas->Facturas->find('all')->where(['Facturas.reserva_id ='=>$idReserva]);
            $factura = $factura->first();
            $this->crearRecibo($factura->id, $this->request->getData()['monto']);
            $this->actualizarEstados($factura->id, $factura->monto, $idReserva);                
            
            $this->Flash->success(__('Se realizó el pago con éxito.'));
        }
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function crearRecibo($idFactura, $monto){
        $factura = $this->Reservas->Facturas->get($idFactura);

        $connection= ConnectionManager::get("default");
        $connection->insert('recibos', [
        'factura_id' => $idFactura,
        'monto' => $monto*$factura->monto,
        'active' => 1,
        'modified' => new \DateTime('now'),
        'created' => new \DateTime('now')], 
        ['created' => 'datetime' , 'modified' => 'datetime']);

        $connection->update('facturas', [
            'porcentajePago' => $factura->porcentajePago + $monto,
            'pagado' => 0,
            'modified' => new \DateTime('now')],
            [ 'id' => $idFactura ],
            ['modified' => 'datetime']);
    }

    public function actualizarEstados($idFactura, $facturaMonto, $idReserva){
        $connection= ConnectionManager::get("default");
        $factura = $this->Reservas->Facturas->get($idFactura);
        $estadoReserva;
        if ($factura->porcentajePago == 1) {
            $connection->update('facturas', [
            'pagado' => 1,
            'modified' => new \DateTime('now')],
            [ 'id' => $idFactura ],
            ['modified' => 'datetime']);
            $estadoReserva = 3;
        } else {
            $estadoReserva = 2;
        }

        $connection->update('reservas', [
        'estado_reserva_id' => $estadoReserva,
        'modified' => new \DateTime('now')],
        [ 'id' => $idReserva ],
        ['modified' => 'datetime']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserva = $this->Reservas->get($id, [
            'contain' => ['Productos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            if ($this->Reservas->save($reserva)) {
                $this->Flash->success(__('The reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserva could not be saved. Please, try again.'));
        }
        $users = $this->Reservas->Users->find('list', ['limit' => 200]);
        $estadosReservas = $this->Reservas->EstadosReservas->find('list', ['limit' => 200]);
        $productos = $this->Reservas->Productos->find('list', ['limit' => 200]);
        $this->set(compact('reserva', 'users', 'estadosReservas', 'productos'));
        $this->set('_serialize', ['reserva']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserva = $this->Reservas->get($id);
        if ($this->Reservas->delete($reserva)) {
            $this->Flash->success(__('The reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The reserva could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function actualizarEnvio($idDom = null)
    {
        if($this->request->is('ajax')) {
            $session = $this->request->session();
            $allProducts = $session->read('cart');
            $cantidad = 0;
            if (null!=$allProducts) {
                foreach ($allProducts as $id => $count) {
                    $cantidad = $cantidad+$count;
                }
            }
            //$idDomicilio = $this->request->query['id'];
            $domicilio = $this->Reservas->Users->Domicilios->get($idDom);
            $localidad = $this->Reservas->Users->Domicilios->Localidades->get($domicilio->localidad_id);
            return $localidad->precio."|".$cantidad."|".$localidad->duracion_viaje;
        }
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function calcularHoras($fIni, $hIni, $fFin, $hFin){        
        $session = $this->request->session();
        $fechaInicio = new Time($fIni." ".$hIni.":00:00"); 
        $fechaFin = new Time($fFin." ".$hFin.":00:00");
        $diferencia = $fechaInicio->diff($fechaFin);
        $dias = $diferencia->format("%d");       
        $totalHoras;
        if($hFin < $hIni) {
            $totalHoras = (23-$hIni)+($hFin-9)+($dias*14);
        } else {
            $horas = $diferencia->format("%h");                       
            $totalHoras = $dias*14+$horas;            
        }
        return $totalHoras;
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function actualizarTabla(){
        $fIni = $this->request->query['fIni'];
        $hIni = $this->request->query['hIni'];
        $fFin = $this->request->query['fFin'];
        $hFin = $this->request->query['hFin'];
        $horas = $this->calcularHoras($fIni, $hIni, $fFin, $hFin);        

        $session = $this->request->session();
        $allProducts = $session->read('cart');

        $productos = array();
        $cantidad = array();

        if (null!=$allProducts) {
            foreach ($allProducts as $id => $count) {
                $producto = $this->Reservas->Productos->get($id);
                $productos[]=$producto;
                $cantidad[]=$count;
            }
        }
        $contador = 0;
        $totalReserva = 0;
        $tabla = "";

        if (sizeof($allProducts) == 0) {
            $tabla = '<div class="centrar">No posee productos en el carrito.</div><br>';
        } else {
            $tabla = "<table class='table table-striped'>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Cantidad</th>
                    <th>Descripción</th>
                    <th>Precio p/hora</th>
                    <th>Cantidad de horas</th>
                    <th>Precio Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>";
                foreach ($productos as $producto){
                    $tabla = $tabla."<tr>
                        <td>".$producto->id."</td>
                        <td>".$cantidad[$contador]."</td>
                        <td>".$producto->descripcion."</td>
                        <td>$".$producto->precio."</td>
                        <td>".$horas."</td>
                        <td>";
                        $totalProducto = $horas * $producto->precio * $cantidad[$contador];
                        $totalReserva = $totalReserva + $totalProducto;
                    $tabla = $tabla."$".$totalProducto."</td>
                        <td>";
                    $tabla = $tabla."</td>
                    </tr>";
                    $contador = $contador+1;
                }
            $tabla = $tabla."</tbody>
        </table>";
        }        

        $idDom = $this->request->query['idDom'];
        $datosEnvio = $this->actualizarEnvio($idDom);
        echo $tabla."|".$totalReserva."|".$datosEnvio;

        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function actualizarTablaProductos(){
        $session = $this->request->session();
        $allProducts = $session->read('cart');

        $productos = array();
        $cantidad = array();

        if (null!=$allProducts) {
            foreach ($allProducts as $id => $count) {
                $producto = $this->Reservas->Productos->get($id);
                $productos[]=$producto;
                $cantidad[]=$count;
            }
        }

        $tabla = "";

        if (sizeof($allProducts) == 0) {
            $tabla = '<div class="centrar">No posee productos en el carrito.</div><br>';
        } else {
            $tabla = "<div class='col-lg-10 col-lg-offset-1'><table class='table table-striped'>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Cantidad</th>
                        <th>Descripción</th>
                        <th>Precio p/hora</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($productos as $producto){
                    $tabla = $tabla."<tr>
                        <td>".$producto->id."</td>
                        <td>".$cantidad[$contador]."</td>
                        <td>".$producto->descripcion."</td>
                        <td>$".$producto->precio."</td>
                        <td>
                        <input type='button' value='X' class='btn btn-default' onclick='bajaCarro(".$producto->id.")'/>
                        </td>";
                }
            $tabla = $tabla."</tr>";
            $tabla = $tabla."</tbody>
            </table></div>";
        }

        echo $tabla;
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function bajaCarro(){
        //echo "algo";
        $session = $this->request->session();
        $allProducts = $session->read('cart');

        if($this->request->is('ajax')) {
            $idCarrito = $this->request->query['idCarrito'];
            //echo $idCarrito;
            //echo $this->productos;
            $cantidad = 0;
            if (null!=$allProducts) {
                if (array_key_exists($idCarrito, $allProducts)) {
                    unset($allProducts["$idCarrito"]);
                    $session->write('cart', $allProducts);
                    foreach ($allProducts as $id => $count) {
                        $cantidad = $cantidad+$count;
                    }
                    echo $cantidad;
                }
            }
        }
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function contarProductos(){
        $session = $this->request->session();
        $allProducts = $session->read('cart');
        $cantidad = 0;
        if (null!=$allProducts) {
            foreach ($allProducts as $id => $count) {
                $cantidad = $cantidad+$count;
            }            
        }
        echo $cantidad;
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    private function ValidarReserva($fechaIni, $fechaFin, $horaIni, $horaFin, $datos){
        $conn = ConnectionManager::get('default');     

        $firstDate = new \DateTime($fechaIni);
        $secondDate = new \DateTime($fechaFin);
        
        $firstDateDia = date_format(new \DateTime($fechaIni), 'Y/m/d');
        $secondDateDia = date_format(new \DateTime($fechaFin), 'Y/m/d');

        if ($firstDate > $secondDate)
        {
            $this->Flash->error(__('La fecha de inicio debe ser antes que la de fin.'));
            return "false";
        }
        //elseif ($firstDate == $secondDate)
        else
        {
            if ($horaIni >= $horaFin)
            {
                $this->Flash->error(__('La hora de inicio debe ser antes que la de fin.'));
                return "false";
            }
            else
            {
                $J = 0;
                for ($i = $firstDate; (strtotime(date_format($i, 'Y/m/d H:i:s')) <= strtotime(date_format($secondDate, 'Y/m/d H:i:s')))  ; ) 
                {
                    
                    foreach ($datos as $id => $cant)
                    {   
                        $producto = $this->Reservas->Productos->get($id);
                        $cantidadProdu = $producto->cantidad; 

                        $cantidadReservada = 0;
                        $miquery = "SELECT productos.id, sum(reservas_productos.cantidad) as micantidad
                        from productos, reservas, reservas_productos 
                        where '".$firstDate->format('Y/m/d H:i:s')."' between reservas.no_disponible_inicio AND reservas.no_disponible_fin
                        AND productos.id =".$id."
                        AND productos.id = reservas_productos.producto_id
                        AND reservas.id = reservas_productos.reserva_id
                        AND reservas.active = 1
                        group by productos.id";
                        $stmt = $conn->execute($miquery);
                        $resu = $stmt ->fetchAll('assoc');       
                        if(sizeof($resu) == 0){
                            $cantidadReservada = 0;
                        }
                        else
                        {    
                            $cantidad = $resu[0]['micantidad'];
                            if ((int)$cantidad+(int)$cant > (int)$cantidadProdu){
                                $this->Flash->error(__('El producto '.$producto->descripcion.' no se puede reservar en el rango elegido. Verifique su Disponibilidad.'));
                                return "false";
                            }
                        }
                    }
                    $i->add(new \DateInterval('PT1H'));
                }    
            }

        }
        return "true";
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function cancelar($id = null){
        $connection= ConnectionManager::get("default");
        $connection->begin();
        $reserva = $this->Reservas->get($id);
        //if ($this->isCancelable($reserva->fecha_inicio)) {
        //probar esta funcion
        if ($reserva->isCancelable()) {
            $factura = $this->Reservas->Facturas->find("all")->where(['reserva_id ='=>$id]);
            $factura = $factura->first();
            $envios = $this->Reservas->Envios->find("all")->where(['reserva_id ='=>$id]);
            $remitos = $this->Reservas->Facturas->Remitos->find("all")->where(['factura_id ='=>$factura->id]);
            $recibos = $this->Reservas->Facturas->Recibos->find("all")->where(['factura_id ='=>$factura->id]);

            $montoNotaCredito = 0;

            foreach ($recibos as $recibo) {
                $montoNotaCredito = $montoNotaCredito + $recibo->monto;
            }

            foreach ($envios as $envio) {
                $connection->update('envios', [
                'active' => 0,
                'modified' => new \DateTime('now')],
                [ 'id' => $envio->id ],
                ['modified' => 'datetime']);
            }

            foreach ($remitos as $remito) {
                $connection->update('remitos', [
                'active' => 0,
                'modified' => new \DateTime('now')],
                [ 'id' => $remito->id ],
                ['modified' => 'datetime']);
            }

            $connection->update('facturas', [
                'active' => 0,
                'modified' => new \DateTime('now')],
                [ 'id' => $factura->id ],
                ['modified' => 'datetime']);

            $connection->update('reservas', [
                'estado_reserva_id' => 4,
                'active' => 0,
                'modified' => new \DateTime('now')],
                [ 'id' => $reserva->id ],
                ['modified' => 'datetime']);
            
            $entidadNota = TableRegistry::get('Notacredito');
            $notaCredito = $entidadNota->newEntity();
            $notaCredito->factura_id = $factura->id;
            $notaCredito->monto = $montoNotaCredito;
            $notaCredito->active = 1;
            $notaCredito->created = new \DateTime('now');
            $notaCredito->modified = new \DateTime('now');
            $lastId = $entidadNota->save($notaCredito);

            $mailCancelar = array();
            $mailCancelar['correo'] = $this->viewVars['current_user']['email'];
            $mailCancelar['asunto'] = "Cancelación de reserva ".$reserva->id;
            $mailCancelar['mensaje'] = $this->viewVars['current_user']['nombre'].", \n \t queríamos informarte que la reserva número ".$reserva->id. " fue cancelada con éxito. Se generó una nota de crédito número ".$lastId->id." por el monto $".$montoNotaCredito.".
			\n Acercate a nuestra empresa de lunes a viernes de 9 a 12.30hs y de 13.30 a 18hs para retirar el dinero. Desde ya muchas gracias.";
			
            if ($this->mailCancelacion($mailCancelar))
            {
            	$connection->commit();
            	$this->Flash->success(__('Reserva cancelada.'));
            	return $this->redirect(['action' => 'index']);
            }
            else 
            {
            	$connection->rollback();
            	$this->Flash->error(__('No se pudo cancelar la reserva. Por favor póngase en contacto con nosotros.'));
            	return $this->redirect(['action' => 'index']);
            }
           
            
        } else {
        	$connection->rollback();
            $this->Flash->error(__('No se puede cancelar la reserva. Verifique las condiciones generales.'));
            return $this->redirect(['controller' => 'Productos', 'action' => 'condiciones']);
        }
        
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }

    public function isCancelable($fecha){
    	
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
    
    private function mailCancelacion(array $data)
    {
    	$email = new Email('funclub');
    	$email
    	->setFrom(['fun.club.srl@gmail.com' => 'Fun Club'])
    	->setTo($data['correo'])
    	->setSubject($data['asunto']);
    	
    	if ($email->send($data['mensaje']))
    	{
    		return true;
    	}
    	return false;   	
    }

    public function enviarMail($id=null){
        echo $id;
        $productos = $this->Reservas->ReservasProductos->find()->where(['reserva_id =' => $id]);
        $reserva = $this->Reservas->get($id);
        $usuario = $this->Reservas->Users->get($reserva->user_id);
        $arrayProductos = array();
        $cont = 0;
        foreach ($productos as $producto) {
            $arrayProductos[$cont] = "http://localhost/web/Productos/view/".$producto->producto_id."?usoprodu=1&userid=".$usuario->id."#calificar";
            $cont ++;
        }

        $mail = array();
        $mail['correo'] = $usuario->email;
        $mail['asunto'] = "Calificación de productos de la reserva ".$producto->reserva_id;
        $mail['mensaje'] = $usuario->nombre.", \n \t gracias por usar nuestros productos, a partír de este momento vas a poder calificarlos, lo cual sería un agrado para nosotros que lo hicieras. 
        \n Te enviamos los enlaces para que puedas hacerlo desde aquí: \n\n";
        foreach ($arrayProductos as $key => $value) {
            $mail['mensaje'] .= $value."\n";
        }
        $mail['mensaje'] .="\nMuchas gracias. Esperemos que vuelvas a utilizar nuestros productos.";

        if ($this->mailCancelacion($mail))
        {
            $connection= ConnectionManager::get("default");
            $connection->update('reservas', [
                'estado_reserva_id' => 6,
                'modified' => new \DateTime('now')],
                [ 'id' => $producto->reserva_id ],
                ['modified' => 'datetime']);
            $this->Flash->success(__('Se ha enviado el mail.'));
            return $this->redirect(['action' => 'index']);
        }
        else 
        {
            $this->Flash->error(__('No se pudo enviar el mail. Por favor intente luego.'));
            return $this->redirect(['action' => 'index']);
        }        
        
        $this->autoRender = false; // No renderiza mediate el fichero .ctp
    }
}