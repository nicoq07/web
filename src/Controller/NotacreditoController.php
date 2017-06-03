<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notacredito Controller
 *
 * @property \App\Model\Table\NotacreditoTable $Notacredito
 */
class NotacreditoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Facturas']
        ];
        $notacredito = $this->paginate($this->Notacredito);

        $this->set(compact('notacredito'));
        $this->set('_serialize', ['notacredito']);
    }

    /**
     * View method
     *
     * @param string|null $id Notacredito id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notacredito = $this->Notacredito->get($id, [
            'contain' => ['Facturas']
        ]);

        $this->set('notacredito', $notacredito);
        $this->set('_serialize', ['notacredito']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notacredito = $this->Notacredito->newEntity();
        if ($this->request->is('post')) {
            $notacredito = $this->Notacredito->patchEntity($notacredito, $this->request->getData());
            if ($this->Notacredito->save($notacredito)) {
                $this->Flash->success(__('The notacredito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notacredito could not be saved. Please, try again.'));
        }
        $facturas = $this->Notacredito->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('notacredito', 'facturas'));
        $this->set('_serialize', ['notacredito']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notacredito id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notacredito = $this->Notacredito->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notacredito = $this->Notacredito->patchEntity($notacredito, $this->request->getData());
            if ($this->Notacredito->save($notacredito)) {
                $this->Flash->success(__('The notacredito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notacredito could not be saved. Please, try again.'));
        }
        $facturas = $this->Notacredito->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('notacredito', 'facturas'));
        $this->set('_serialize', ['notacredito']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notacredito id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notacredito = $this->Notacredito->get($id);
        if ($this->Notacredito->delete($notacredito)) {
            $this->Flash->success(__('The notacredito has been deleted.'));
        } else {
            $this->Flash->error(__('The notacredito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
