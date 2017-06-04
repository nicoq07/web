<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Envios Controller
 *
 * @property \App\Model\Table\EnviosTable $Envios
 */
class EnviosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Remitos', 'Reservas', 'Domicilios'],
            'conditions' => ['envios.active' => 1],
        ];
        $envios = $this->paginate($this->Envios);

        $this->set(compact('envios'));
        $this->set('_serialize', ['envios']);
    }

    /**
     * View method
     *
     * @param string|null $id Envio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $envio = $this->Envios->get($id, [
            'contain' => ['Remitos', 'Reservas', 'Domicilios']
        ]);

        $this->set('envio', $envio);
        $this->set('_serialize', ['envio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $envio = $this->Envios->newEntity();
        if ($this->request->is('post')) {
            $envio = $this->Envios->patchEntity($envio, $this->request->getData());
            if ($this->Envios->save($envio)) {
                $this->Flash->success(__('The envio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The envio could not be saved. Please, try again.'));
        }
        $remitos = $this->Envios->Remitos->find('list', ['limit' => 200]);
        $reservas = $this->Envios->Reservas->find('list', ['limit' => 200]);
        $domicilios = $this->Envios->Domicilios->find('list', ['limit' => 200]);
        $this->set(compact('envio', 'remitos', 'reservas', 'domicilios'));
        $this->set('_serialize', ['envio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Envio id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $envio = $this->Envios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $envio = $this->Envios->patchEntity($envio, $this->request->getData());
            if ($this->Envios->save($envio)) {
                $this->Flash->success(__('The envio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The envio could not be saved. Please, try again.'));
        }
        $remitos = $this->Envios->Remitos->find('list', ['limit' => 200]);
        $reservas = $this->Envios->Reservas->find('list', ['limit' => 200]);
        $domicilios = $this->Envios->Domicilios->find('list', ['limit' => 200]);
        $this->set(compact('envio', 'remitos', 'reservas', 'domicilios'));
        $this->set('_serialize', ['envio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Envio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $envio = $this->Envios->get($id);
        if ($this->Envios->delete($envio)) {
            $this->Flash->success(__('The envio has been deleted.'));
        } else {
            $this->Flash->error(__('The envio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
