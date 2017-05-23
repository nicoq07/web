<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;
use Cake\I18n\Time;
use Cake\I18n\Date;

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
        $reserva = $this->Reservas->newEntity();
        if ($this->request->is('post')) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            if ($this->Reservas->save($reserva)) {
                $this->Flash->success(__('The reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserva could not be saved. Please, try again.'));
        }
        $users = $this->Reservas->Users->find('list', ['limit' => 200]);
        $estadosReservas = $this->Reservas->EstadosReservas->find('list', ['limit' => 200]);
        //$productos = $this->Reservas->Productos->find('list', ['limit' => 200]);
        $domicilios = $this->Reservas->Users->Domicilios->find();        
        $localidades = $this->Reservas->Users->Domicilios->Localidades->find();

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
        
        $this->set(compact('reserva', 'users', 'estadosReservas', 'productos', 'domicilios','localidades'));
        $this->set('_serialize', ['reserva']);
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
            if ($this->request->query['desde'] == 'domicilio') {
                $this->autoRender = false; // No renderiza mediate el fichero .ctp
                $idDomicilio = $this->request->query['id'];
                $domicilio = $this->Reservas->Users->Domicilios->get($idDomicilio);
                $localidad = $this->Reservas->Users->Domicilios->Localidades->get($domicilio->localidad_id);
                echo $localidad->precio;
            }
            if ($this->request->query['desde'] == 'localidad') {
                $this->autoRender = false; // No renderiza mediate el fichero .ctp
                $idLocalidad = $this->request->query['id']; //id traido desde la view por Ajax      
                $localidad = $this->Reservas->Users->Domicilios->Localidades->get($idLocalidad);
                echo $localidad->precio;
            }           
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
        $session = $this->request->session();
        $allProducts = $session->read('cart');
        if (null!=$allProducts) {
            foreach ($allProducts as $id => $count) {
                $producto = $this->Reservas->Productos->get($id);
                $productos[]=$producto;
            }
        }

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
                        <td>".$producto->cantidad."</td>
                        <td>".$producto->descripcion."</td>
                        <td>".$producto->precio."</td>
                        <td>".$horas."</td>
                        <td>";
                        $totalProducto = $horas * $producto->precio;
                        $totalReserva = $totalReserva + $totalProducto;
                    $tabla = $tabla.$totalProducto."</td>
                        <td>";
                    if ($botones == 'true') {
                        $tabla = $tabla."<button class='btn btn-default'> X </button>";
                    }
                    $tabla = $tabla."</td>
                    </tr>";
                }
            $tabla = $tabla."</tbody>
        </table>";
        echo $tabla;
    }
}
