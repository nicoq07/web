<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class CategoriasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$categorias= $this->paginate($this->Categorias->find('all'));

        $this->set(compact('categorias'));
        $this->set('_serialize', ['categorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => ['Productos']
        ]);

        $this->set('categoria', $categoria);
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoria = $this->Categorias->newEntity();
        if ($this->request->is('post')) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('Categoría guardada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La categoría no pudo guardarse, reintente'));
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->getData());
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('Categoría guardada'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La categoría no pudo editarse, reintente'));
        }
        $this->set(compact('categoria'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
            $this->Flash->success(__('Categoría borrada'));
        } else {
            $this->Flash->error(__('La categoría no pudo borrarse, reintente'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function desactivar($id = null)
    {
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$categoria= $this->Categorias->get($id);
    		$categoria->active = false;
    		if ($this->Categorias->save($categoria)) {
    			$this->Flash->success(__('Categoría borrada'));
    			return $this->redirect($this->referer());
    		}
    		$this->Flash->error(__('La categoría no pudo borrarse, reintente!'));
    	}
    }
}
