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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
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
    public function add()
    {
        $tarjetasCreditoUser = $this->TarjetasCreditoUser->newEntity();
        if ($this->request->is('post')) {
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
