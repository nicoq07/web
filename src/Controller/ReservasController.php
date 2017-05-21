<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Session\DatabaseSession;

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

    public function actualizarCostoEnvio()
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

    public function calcularTotal(){
        if($this->request->is('ajax')) {
            if ($this->request->query['desde'] == 'domicilio') {
                $this->autoRender = false; // No renderiza mediate el fichero .ctp
                $idDomicilio = $this->request->query['id_direccion'];
                $domicilio = $this->Reservas->Users->Domicilios->get($idDomicilio);
                $localidad = $this->Reservas->Users->Domicilios->Localidades->get($domicilio->localidad_id);
                echo $localidad->precio;
            }
            if ($this->request->query['desde'] == 'localidad') {
                $this->autoRender = false; // No renderiza mediate el fichero .ctp
                $idLocalidad = $this->request->query['id_direccion']; //id traido desde la view por Ajax      
                $localidad = $this->Reservas->Users->Domicilios->Localidades->get($idLocalidad);
                echo $localidad->precio;
            }           
        }
    } 
}
