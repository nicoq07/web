<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CalificacionesProductos Controller
 *
 * @property \App\Model\Table\CalificacionesProductosTable $CalificacionesProductos
 */
class CalificacionesProductosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Productos']
        ];
        $calificacionesProductos = $this->paginate($this->CalificacionesProductos);

        $this->set(compact('calificacionesProductos'));
        $this->set('_serialize', ['calificacionesProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Calificaciones Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calificacionesProducto = $this->CalificacionesProductos->get($id, [
            'contain' => ['Users', 'Productos']
        ]);

        $this->set('calificacionesProducto', $calificacionesProducto);
        $this->set('_serialize', ['calificacionesProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $calificacionesProducto = $this->CalificacionesProductos->newEntity();
        if ($this->request->is('post')) {
            $calificacionesProducto = $this->CalificacionesProductos->patchEntity($calificacionesProducto, $this->request->getData());
            if ($this->CalificacionesProductos->save($calificacionesProducto)) {
                $this->Flash->success(__('The calificaciones producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calificaciones producto could not be saved. Please, try again.'));
        }
        $users = $this->CalificacionesProductos->Users->find('list', ['limit' => 200]);
        $productos = $this->CalificacionesProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('calificacionesProducto', 'users', 'productos'));
        $this->set('_serialize', ['calificacionesProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Calificaciones Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $calificacionesProducto = $this->CalificacionesProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calificacionesProducto = $this->CalificacionesProductos->patchEntity($calificacionesProducto, $this->request->getData());
            if ($this->CalificacionesProductos->save($calificacionesProducto)) {
                $this->Flash->success(__('The calificaciones producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calificaciones producto could not be saved. Please, try again.'));
        }
        $users = $this->CalificacionesProductos->Users->find('list', ['limit' => 200]);
        $productos = $this->CalificacionesProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('calificacionesProducto', 'users', 'productos'));
        $this->set('_serialize', ['calificacionesProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Calificaciones Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calificacionesProducto = $this->CalificacionesProductos->get($id);
        if ($this->CalificacionesProductos->delete($calificacionesProducto)) {
            $this->Flash->success(__('The calificaciones producto has been deleted.'));
        } else {
            $this->Flash->error(__('The calificaciones producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
