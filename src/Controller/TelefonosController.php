<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Telefonos Controller
 *
 * @property \App\Model\Table\TelefonosTable $Telefonos
 */
class TelefonosController extends AppController
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
            'contain' => ['Users', 'TipoTelefonos']
        ];
        $telefonos = $this->paginate($this->Telefonos);

        $this->set(compact('telefonos'));
        $this->set('_serialize', ['telefonos']);
    }

    /**
     * View method
     *
     * @param string|null $id Telefono id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $telefono = $this->Telefonos->get($id, [
            'contain' => ['Users', 'TipoTelefonos']
        ]);

        $this->set('telefono', $telefono);
        $this->set('_serialize', ['telefono']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $telefono = $this->Telefonos->newEntity();
        if ($this->request->is('post')) {
        	$telefono = $this->Telefonos->patchEntity($telefono, $this->request->getData());
        	$user = $this->Auth->user();
        	if ($user['rol_id'] == CLIENTE)
        	{
        		$telefono->user_id = $user['id'];
        	}
            
            if ($this->Telefonos->save($telefono)) {
                $this->Flash->success(__('Teléfono guardado.'));
                if ($user['rol_id'] == CLIENTE)
                {
                	return $this->redirect(['controller' =>'users' ,'action' => 'telefonos']);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al intentar guardar el telefono, reintente!.'));
        }
        $users = $this->Telefonos->Users->find('list', ['limit' => 200]);
        $tipoTelefonos = $this->Telefonos->TipoTelefonos->find('list', ['limit' => 200]);
        $this->set(compact('telefono', 'users', 'tipoTelefonos'));
        $this->set('_serialize', ['telefono']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Telefono id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $telefono = $this->Telefonos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $telefono = $this->Telefonos->patchEntity($telefono, $this->request->getData());
            if ($this->Telefonos->save($telefono)) {
                $this->Flash->success(__('The telefono has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The telefono could not be saved. Please, try again.'));
        }
        $users = $this->Telefonos->Users->find('list', ['limit' => 200]);
        $tipoTelefonos = $this->Telefonos->TipoTelefonos->find('list', ['limit' => 200]);
        $this->set(compact('telefono', 'tipoTelefonos','users'));
        $this->set('_serialize', ['telefono']);
    }
    
    public function editcliente($id = null)
    {
    	$telefono = $this->Telefonos->get($id, [
    			'contain' => []
    	]);
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$telefono = $this->Telefonos->patchEntity($telefono, $this->request->getData());
    		if ($this->Telefonos->save($telefono)) {
    			$this->Flash->success(__('Teléfono actualizado.'));
    			
    			return $this->redirect(['controller' => 'users', 'action' => 'telefonos']);
    		}
    		$this->Flash->error(__('Error intentanto guardar el teléfono, reintente!'));
    	}
    	
    	$tipoTelefonos = $this->Telefonos->TipoTelefonos->find('list', ['limit' => 200]);
    	$this->set(compact('telefono',  'tipoTelefonos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Telefono id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $telefono = $this->Telefonos->get($id);
        if ($this->Telefonos->delete($telefono)) {
            $this->Flash->success(__('The telefono has been deleted.'));
        } else {
            $this->Flash->error(__('The telefono could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
