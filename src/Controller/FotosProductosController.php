<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FotosProductos Controller
 *
 * @property \App\Model\Table\FotosProductosTable $FotosProductos
 */
class FotosProductosController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == CLIENTE)
		{
			return false;
		}
		elseif (isset($user['rol_id']) && $user['rol_id'] == EMPLEADO) {
			
			return true;
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
        $this->paginate = [
            'contain' => ['Productos']
        ];
        $fotosProductos = $this->paginate($this->FotosProductos);

        $this->set(compact('fotosProductos'));
        $this->set('_serialize', ['fotosProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Fotos Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fotosProducto = $this->FotosProductos->get($id, [
            'contain' => ['Productos']
        ]);

        $this->set('fotosProducto', $fotosProducto);
        $this->set('_serialize', ['fotosProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fotosProducto = $this->FotosProductos->newEntity();
        if ($this->request->is('post')) {
            $fotosProducto = $this->FotosProductos->patchEntity($fotosProducto, $this->request->getData());
            if ($this->FotosProductos->save($fotosProducto)) {
                $this->Flash->success(__('The fotos producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos producto could not be saved. Please, try again.'));
        }
        $productos = $this->FotosProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('fotosProducto', 'productos'));
        $this->set('_serialize', ['fotosProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fotos Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fotosProducto = $this->FotosProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fotosProducto = $this->FotosProductos->patchEntity($fotosProducto, $this->request->getData());
            if ($this->FotosProductos->save($fotosProducto)) {
                $this->Flash->success(__('The fotos producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos producto could not be saved. Please, try again.'));
        }
        $productos = $this->FotosProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('fotosProducto', 'productos'));
        $this->set('_serialize', ['fotosProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fotos Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fotosProducto = $this->FotosProductos->get($id);
        if ($this->FotosProductos->delete($fotosProducto)) {
            $this->Flash->success(__('The fotos producto has been deleted.'));
        } else {
            $this->Flash->error(__('The fotos producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
