<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * MultasUser Controller
 *
 * @property \App\Model\Table\MultasUserTable $MultasUser
 */
class MultasUserController extends AppController
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
        $multasUser = $this->paginate($this->MultasUser);

        $this->set(compact('multasUser'));
        $this->set('_serialize', ['multasUser']);
    }

    /**
     * View method
     *
     * @param string|null $id Multas User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $multasUser = $this->MultasUser->get($id, [
            'contain' => ['Users', 'PagosMultas']
        ]);

        $this->set('multasUser', $multasUser);
        $this->set('_serialize', ['multasUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $multasUser = $this->MultasUser->newEntity();
        if ($this->request->is('post')) {
            $multasUser = $this->MultasUser->patchEntity($multasUser, $this->request->getData());
            $multasUser->user_id = $id;
            $multasUser->active = 1;
            if ($this->MultasUser->save($multasUser)) {
                $connection= ConnectionManager::get("default");
                $connection->update('users', [
                    'active' => 0,
                    'modified' => new \DateTime('now')],
                    [ 'id' => $id ],
                    ['modified' => 'datetime']);
                $this->Flash->success(__('La multa fue creada con éxito.'));

                return $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
            $this->Flash->error(__('La multa no pudo ser creada. Reintente por favor.'));
        }
        $users = $this->MultasUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('multasUser', 'users'));
        $this->set('_serialize', ['multasUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Multas User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $multasUser = $this->MultasUser->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $multasUser = $this->MultasUser->patchEntity($multasUser, $this->request->getData());
            if ($this->MultasUser->save($multasUser)) {
                $this->Flash->success(__('The multas user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multas user could not be saved. Please, try again.'));
        }
        $users = $this->MultasUser->Users->find('list', ['limit' => 200]);
        $this->set(compact('multasUser', 'users'));
        $this->set('_serialize', ['multasUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Multas User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $multasUser = $this->MultasUser->get($id);
        if ($this->MultasUser->delete($multasUser)) {
            $this->Flash->success(__('The multas user has been deleted.'));
        } else {
            $this->Flash->error(__('The multas user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
