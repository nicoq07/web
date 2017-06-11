<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
/**
 * TarjetasCreditoUser Controller
 *
 * @property \App\Model\Table\TarjetasCreditoUserTable $TarjetasCreditoUser
 */
class TarjetasCreditoUserController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user['rol_id']) &&  ($user['rol_id'] == BLOQUEADO || $user['rol_id'] == CLIENTE))
        {
            if(in_array($this->request->action, ['add', 'edit', 'desactivar']))
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
            'contain' => ['Users']
        		,
        	'conditions' => ['active' => '1']
        ];
        $tarjetasCreditoUser = $this->paginate($this->TarjetasCreditoUser)->toArray();
        debug(check($tarjetasCreditoUser[0]['numero']));
        $this->set(compact('tarjetasCreditoUser'));
        $this->set('_serialize', ['tarjetasCreditoUser']);
    }

    /**
     * View method
     *
     * @param string|null $id Tarjetas Credito User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarjetasCreditoUser = $this->TarjetasCreditoUser->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('tarjetasCreditoUser', $tarjetasCreditoUser);
        $this->set('_serialize', ['tarjetasCreditoUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($user_id = null)
    {
    	
        $tarjetasCreditoUser = $this->TarjetasCreditoUser->newEntity();
        if (!empty($user_id))
        {
        	$tarjetasCreditoUser->user_id = $user_id;
        }
        if ($this->request->is('post')) {
            $tarjetasCreditoUser = $this->TarjetasCreditoUser->patchEntity($tarjetasCreditoUser, $this->request->getData());
            $tarjetasCreditoUser->user_id = $this->viewVars['current_user']['id'];
            $tarjetasCreditoUser->active = 1;
            if ($this->TarjetasCreditoUser->save($tarjetasCreditoUser)) {
                $this->Flash->success(__('Tarjeta agregada'));
                if (!empty($user_id))
                {
                	return $this->redirect(['controller' =>'users' ,'action' => 'tarjetas']);
                }
                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('Error al guardar la tarjeta, reintente.'));
        }
        
        $marca = array('VISA','MASTERCARD','AMERICAN EXPRESS');
        $marca = array_combine($marca,$marca);
        $users = $this->TarjetasCreditoUser->Users->find('list',[
        		'conditions' => ['active' => '1']
        ],['limit' => 200]);
        $this->set(compact('tarjetasCreditoUser', 'users','marca'));
        $this->set('_serialize', ['tarjetasCreditoUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarjetas Credito User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarjetasCreditoUser = $this->TarjetasCreditoUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarjetasCreditoUser = $this->TarjetasCreditoUser->patchEntity($tarjetasCreditoUser, $this->request->getData());
            if ($this->TarjetasCreditoUser->save($tarjetasCreditoUser)) {
                $this->Flash->success(__('The tarjetas credito user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarjetas credito user could not be saved. Please, try again.'));
        }
        $users = $this->TarjetasCreditoUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('tarjetasCreditoUser', 'users'));
        $this->set('_serialize', ['tarjetasCreditoUser']);
    }
    
    public function desactivar($id = null)
    {
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$tarjetasCreditoUser = $tarjetasCreditoUser = $this->TarjetasCreditoUser->get($id);
    		$tarjetasCreditoUser->active = false;
    		if ($this->TarjetasCreditoUser->save($tarjetasCreditoUser)) {
    			$this->Flash->success(__('Tarjeta borrada'));
    			
    			return $this->redirect($this->referer());
    		}
    		$this->Flash->error(__('La tarjeta no pudo borrarse, reintente!'));
    	}
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarjetas Credito User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarjetasCreditoUser = $this->TarjetasCreditoUser->get($id);
        if ($this->TarjetasCreditoUser->delete($tarjetasCreditoUser)) {
            $this->Flash->success(__('The tarjetas credito user has been deleted.'));
        } else {
            $this->Flash->error(__('The tarjetas credito user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
