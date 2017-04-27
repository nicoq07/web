<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paises Controller
 *
 * @property \App\Model\Table\PaisesTable $Paises
 */
class PaisesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $paises = $this->paginate($this->Paises);

        $this->set(compact('paises'));
        $this->set('_serialize', ['paises']);
    }

    /**
     * View method
     *
     * @param string|null $id Paise id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paise = $this->Paises->get($id, [
            'contain' => []
        ]);

        $this->set('paise', $paise);
        $this->set('_serialize', ['paise']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paise = $this->Paises->newEntity();
        if ($this->request->is('post')) {
            $paise = $this->Paises->patchEntity($paise, $this->request->getData());
            if ($this->Paises->save($paise)) {
                $this->Flash->success(__('The paise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paise could not be saved. Please, try again.'));
        }
        $this->set(compact('paise'));
        $this->set('_serialize', ['paise']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paise id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paise = $this->Paises->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paise = $this->Paises->patchEntity($paise, $this->request->getData());
            if ($this->Paises->save($paise)) {
                $this->Flash->success(__('The paise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paise could not be saved. Please, try again.'));
        }
        $this->set(compact('paise'));
        $this->set('_serialize', ['paise']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paise id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paise = $this->Paises->get($id);
        if ($this->Paises->delete($paise)) {
            $this->Flash->success(__('The paise has been deleted.'));
        } else {
            $this->Flash->error(__('The paise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
