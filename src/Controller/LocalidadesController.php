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
            if ($this->Localidades->save($localidade)) {
                $this->Flash->success(__('The localidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The localidade could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The localidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The localidade could not be saved. Please, try again.'));
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
