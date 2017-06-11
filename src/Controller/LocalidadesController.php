<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Localidades Controller
 *
 * @property \App\Model\Table\LocalidadesTable $Localidades
 */
class LocalidadesController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user['rol_id']) &&  ($user['rol_id'] == EMPLEADO || $user['rol_id'] == ADMINISTRADOR))
        {
            if(in_array($this->request->action, ['index', 'add', 'edit', 'delete']))
            {
                return true;
            }
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
            'contain' => ['Provincias']
        ];
        $localidades = $this->paginate($this->Localidades);

        $this->set(compact('localidades'));
        $this->set('_serialize', ['localidades']);
    }

    /**
     * View method
     *
     * @param string|null $id Localidade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $localidade = $this->Localidades->get($id, [
            'contain' => ['Provincias']
        ]);

        $this->set('localidade', $localidade);
        $this->set('_serialize', ['localidade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $localidade = $this->Localidades->newEntity();
        if ($this->request->is('post')) {
            $localidade = $this->Localidades->patchEntity($localidade, $this->request->getData());
            $localidade->active = 1;
            if ($this->Localidades->save($localidade)) {
                $this->Flash->success(__('La localidad fue guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La localidad no pudo ser guardada, intente nuevamente.'));
        }
        $provincias = $this->Localidades->Provincias->find('list', ['limit' => 200]);
        $this->set(compact('localidade', 'provincias'));
        $this->set('_serialize', ['localidade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Localidade id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $localidade = $this->Localidades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $localidade = $this->Localidades->patchEntity($localidade, $this->request->getData());
            if ($this->Localidades->save($localidade)) {
                $this->Flash->success(__('La localidad fue guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La localidad no pudo ser guardada, intente nuevamente.'));
        }
        $provincias = $this->Localidades->Provincias->find('list', ['limit' => 200]);
        $this->set(compact('localidade', 'provincias'));
        $this->set('_serialize', ['localidade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Localidade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $localidade = $this->Localidades->get($id);
        if ($this->Localidades->delete($localidade)) {
            $this->Flash->success(__('The localidade has been deleted.'));
        } else {
            $this->Flash->error(__('The localidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
