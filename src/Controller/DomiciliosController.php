<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Domicilios Controller
 *
 * @property \App\Model\Table\DomiciliosTable $Domicilios
 */
class DomiciliosController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == CLIENTE)
		{
			if(in_array($this->request->action, ['add']))
			{
				return true;
			}
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
            'contain' => ['Users', 'Localidades']
        ];
        $domicilios = $this->paginate($this->Domicilios);

        $this->set(compact('domicilios'));
        $this->set('_serialize', ['domicilios']);
    }

    /**
     * View method
     *
     * @param string|null $id Domicilio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $domicilio = $this->Domicilios->get($id, [
            'contain' => ['Users', 'Localidades', 'Envios']
        ]);

        $this->set('domicilio', $domicilio);
        $this->set('_serialize', ['domicilio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $domicilio = $this->Domicilios->newEntity();
        if ($this->request->is('post')) {
            $domicilio = $this->Domicilios->patchEntity($domicilio, $this->request->getData());
            if ($this->Domicilios->save($domicilio)) {
                $this->Flash->success(__('The domicilio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domicilio could not be saved. Please, try again.'));
        }
        $users = $this->Domicilios->Users->find('list', ['limit' => 200]);
        $localidades = $this->Domicilios->Localidades->find('list', ['limit' => 200]);
        $this->set(compact('domicilio', 'users', 'localidades'));
        $this->set('_serialize', ['domicilio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Domicilio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $domicilio = $this->Domicilios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $domicilio = $this->Domicilios->patchEntity($domicilio, $this->request->getData());
            if ($this->Domicilios->save($domicilio)) {
                $this->Flash->success(__('Domicilio actualizado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Problemas para guardar el domicilio. Si podés, reintentá.'));
        }
        $users = $this->Domicilios->Users->find('list', ['limit' => 200]);
        $localidades = $this->Domicilios->Localidades->find('list', ['limit' => 200]);
        $this->set(compact('domicilio', 'users', 'localidades'));
        $this->set('_serialize', ['domicilio']);
    }
	
    public function editcliente($id = null)
    {
    	$domicilio = $this->Domicilios->get($id, [
    			'contain' => []
    	]);
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$domicilio = $this->Domicilios->patchEntity($domicilio, $this->request->getData());
    		if ($this->Domicilios->save($domicilio)) {
    			$this->Flash->success(__('Domicilio actualizado.'));
    			
    			return $this->redirect(['controller' => 'users', 'action' => 'direcciones']);
    		}
    		$this->Flash->error(__('Problemas para guardar el domicilio. Si podés, reintentá'));
    	}
    	$localidades = $this->Domicilios->Localidades->find('list', ['limit' => 200]);
    	$this->set(compact('domicilio', 'localidades'));
    	$this->set('_serialize', ['domicilio']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Domicilio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $domicilio = $this->Domicilios->get($id);
        if ($this->Domicilios->delete($domicilio)) {
            $this->Flash->success(__('The domicilio has been deleted.'));
        } else {
            $this->Flash->error(__('The domicilio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
