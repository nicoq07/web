<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Datasource\ConnectionManager;

/**
 * Reservas Controller
 *
 * @property \App\Model\Table\ReservasTable $Reservas
 */
class ReservasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'EstadosReservas']
        ];
        $reservas = $this->paginate($this->Reservas);

        $this->set(compact('reservas'));
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

        $this->set('reserva', $reserva);
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
        $allProducts = $session->read('cart');

        $productos = array();
        $session = $this->request->session();
        $allProducts = $session->read('cart');
        if (null!=$allProducts) {
            foreach ($allProducts as $id => $count) {
                $producto = $this->Reservas->Productos->get($id);
                $productos[]=$producto;                
            }
        }

        $reserva = $this->Reservas->newEntity();
        if ($this->request->is('post')) {
            $fechaIni =  $this->request->getData()['fecha_inicio'];
            $fechaFin =  $this->request->getData()['fecha_fin'];
            $horaIni =  $this->request->getData()['hora_inicio'];
            $horaFin =  $this->request->getData()['hora_fin'];
            $totalReserva =  $this->request->getData()['totalReserva'];        
            $fechaIni = new \DateTime($fechaIni." ".$horaIni);
            $fechaIni = date_format($fechaIni, 'Y/m/d H:i:s');
            $fechaFin = new \DateTime($fechaFin." ".$horaFin);
            $fechaFin = date_format($fechaFin, 'Y/m/d H:i:s');
            
            $miReserva = array();
            $miReserva['fecha_fin'] = $fechaFin;
            $miReserva['fecha_inicio'] = $fechaIni;
            $miReserva['estado_reserva_id'] = 1;
            $miReserva['total'] = $totalReserva;            
            $miReserva['user_id'] = $this->viewVars['current_user']['id'];
            $miReserva['active'] = 1; 

            $reserva = $this->Reservas->patchEntity($reserva, $miReserva); 

            if ($lastId = $this->Reservas->save($reserva)) {
                $this->guardarProductos($session->read('cart'), $lastId->id);
                $this->Flash->success(__('Reserva creada.'));

                return $this->redirect(['controller' => 'PagosReserva', 'action' => 'add', $lastId->id]);
            }
            $this->Flash->error(__('Error al cargar la reserva, reintente por favor.'));
            return $this->redirect(['action' => 'add']);
            
        }
        
        $users = $this->Reservas->Users->find('list', ['limit' => 200]);
        $estadosReservas = $this->Reservas->EstadosReservas->find('list', ['limit' => 200]);
        $domicilios = $this->Reservas->Users->Domicilios->find();        
        $localidades = $this->Reservas->Users->Domicilios->Localidades->find();
        $this->set(compact('reserva', 'users', 'estadosReservas', 'productos', 'domicilios','localidades'));
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

    public function actualizarEnvio()
    {
        if($this->request->is('ajax')) {
            $this->autoRender = false; // No renderiza mediate el fichero .ctp
            $idDomicilio = $this->request->query['id'];
            $domicilio = $this->Reservas->Users->Domicilios->get($idDomicilio);
            $localidad = $this->Reservas->Users->Domicilios->Localidades->get($domicilio->localidad_id);
            echo $localidad->precio;
        }
    }

    public function calcularHoras(){        
        $session = $this->request->session();
        if($this->request->is('ajax')) {
            $this->autoRender = false; // No renderiza mediate el fichero .ctp
            $strStart = $this->request->query['inicio'];
            $strEnd = $this->request->query['fin'];
            $dteStart = new Date($strStart); 
            $dteEnd   = new Date($strEnd);
            $dteDiff = $dteStart->diff($dteEnd);
            $horas = $dteDiff->format("%h");
            echo $horas;
            $session->write('horas', $horas); 
            //echo var_dump($session->read('horas'));
        }
    }

    public function actualizarTabla(){
        $horas = $this->request->query['horas'];
        $botones = $this->request->query['botones'];

        $session = $this->request->session();
        $allProducts = $session->read('cart');

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
        $contador = 0;
        $totalReserva = 0;
        $tabla = "";

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
                        <td>".$producto->precio."</td>
                        <td>".$horas."</td>
                        <td>";
                        $totalProducto = $horas * $producto->precio * $cantidad[$contador];
                        $totalReserva = $totalReserva + $totalProducto;
                    $tabla = $tabla.$totalProducto."</td>
                        <td>";
                    if ($botones == 'true') {
                        $tabla = $tabla."<input type='button' value='X' class='btn btn-default' onclick='bajaCarro(".$producto->id.")'/>";
                    }
                    $tabla = $tabla."</td>
                    </tr>";
                    $contador = $contador+1;
                }
            $tabla = $tabla."</tbody>
        </table>";
        echo $tabla."|".$totalReserva;
    }

    public function bajaCarro(){
        //echo "algo";
        $session = $this->request->session();
        $allProducts = $session->read('cart');

        if($this->request->is('ajax')) {
            $idCarrito = $this->request->query['idCarrito'];
            echo $idCarrito;
            echo $this->productos;
            if (null!=$allProducts) {
                if (array_key_exists($idCarrito, $allProducts)) {
                    unset($allProducts["$idCarrito"]);
                    $session->write('cart', $allProducts);  
                }
            }
        }

    }
}
