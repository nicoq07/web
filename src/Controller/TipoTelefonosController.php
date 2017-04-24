<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoTelefonos Controller
 *
 * @property \App\Model\Table\TipoTelefonosTable $TipoTelefonos
 */
class TipoTelefonosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tipoTelefonos = $this->paginate($this->TipoTelefonos);

        $this->set(compact('tipoTelefonos'));
        $this->set('_serialize', ['tipoTelefonos']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Telefono id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoTelefono = $this->TipoTelefonos->get($id, [
            'contain' => ['Telefonos']
        ]);

        $this->set('tipoTelefono', $tipoTelefono);
        $this->set('_serialize', ['tipoTelefono']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoTelefono = $this->TipoTelefonos->newEntity();
        if ($this->request->is('post')) {
            $tipoTelefono = $this->TipoTelefonos->patchEntity($tipoTelefono, $this->request->getData());
            if ($this->TipoTelefonos->save($tipoTelefono)) {
                $this->Flash->success(__('The tipo telefono has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo telefono could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoTelefono'));
        $this->set('_serialize', ['tipoTelefono']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Telefono id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoTelefono = $this->TipoTelefonos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoTelefono = $this->TipoTelefonos->patchEntity($tipoTelefono, $this->request->getData());
            if ($this->TipoTelefonos->save($tipoTelefono)) {
                $this->Flash->success(__('The tipo telefono has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo telefono could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoTelefono'));
        $this->set('_serialize', ['tipoTelefono']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Telefono id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoTelefono = $this->TipoTelefonos->get($id);
        if ($this->TipoTelefonos->delete($tipoTelefono)) {
            $this->Flash->success(__('The tipo telefono has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo telefono could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
