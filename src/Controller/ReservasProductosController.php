<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ReservasProductos Controller
 *
 * @property \App\Model\Table\ReservasProductosTable $ReservasProductos
 */
class ReservasProductosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reservas', 'Productos']
        ];
        $reservasProductos = $this->paginate($this->ReservasProductos);

        $this->set(compact('reservasProductos'));
        $this->set('_serialize', ['reservasProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Reservas Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservasProducto = $this->ReservasProductos->get($id, [
            'contain' => ['Reservas', 'Productos']
        ]);

        $this->set('reservasProducto', $reservasProducto);
        $this->set('_serialize', ['reservasProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservasProducto = $this->ReservasProductos->newEntity();
        if ($this->request->is('post')) {
            $reservasProducto = $this->ReservasProductos->patchEntity($reservasProducto, $this->request->getData());
            if ($this->ReservasProductos->save($reservasProducto)) {
                $this->Flash->success(__('The reservas producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservas producto could not be saved. Please, try again.'));
        }
        $reservas = $this->ReservasProductos->Reservas->find('list', ['limit' => 200]);
        $productos = $this->ReservasProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('reservasProducto', 'reservas', 'productos'));
        $this->set('_serialize', ['reservasProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservas Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservasProducto = $this->ReservasProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservasProducto = $this->ReservasProductos->patchEntity($reservasProducto, $this->request->getData());
            if ($this->ReservasProductos->save($reservasProducto)) {
                $this->Flash->success(__('The reservas producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservas producto could not be saved. Please, try again.'));
        }
        $reservas = $this->ReservasProductos->Reservas->find('list', ['limit' => 200]);
        $productos = $this->ReservasProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('reservasProducto', 'reservas', 'productos'));
        $this->set('_serialize', ['reservasProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservas Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservasProducto = $this->ReservasProductos->get($id);
        if ($this->ReservasProductos->delete($reservasProducto)) {
            $this->Flash->success(__('The reservas producto has been deleted.'));
        } else {
            $this->Flash->error(__('The reservas producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
