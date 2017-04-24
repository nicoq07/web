<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Remitos Controller
 *
 * @property \App\Model\Table\RemitosTable $Remitos
 */
class RemitosController extends AppController
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
        $remitos = $this->paginate($this->Remitos);

        $this->set(compact('remitos'));
        $this->set('_serialize', ['remitos']);
    }

    /**
     * View method
     *
     * @param string|null $id Remito id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $remito = $this->Remitos->get($id, [
            'contain' => ['Facturas', 'Envios']
        ]);

        $this->set('remito', $remito);
        $this->set('_serialize', ['remito']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $remito = $this->Remitos->newEntity();
        if ($this->request->is('post')) {
            $remito = $this->Remitos->patchEntity($remito, $this->request->getData());
            if ($this->Remitos->save($remito)) {
                $this->Flash->success(__('The remito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The remito could not be saved. Please, try again.'));
        }
        $facturas = $this->Remitos->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('remito', 'facturas'));
        $this->set('_serialize', ['remito']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Remito id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $remito = $this->Remitos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $remito = $this->Remitos->patchEntity($remito, $this->request->getData());
            if ($this->Remitos->save($remito)) {
                $this->Flash->success(__('The remito has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The remito could not be saved. Please, try again.'));
        }
        $facturas = $this->Remitos->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('remito', 'facturas'));
        $this->set('_serialize', ['remito']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Remito id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $remito = $this->Remitos->get($id);
        if ($this->Remitos->delete($remito)) {
            $this->Flash->success(__('The remito has been deleted.'));
        } else {
            $this->Flash->error(__('The remito could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
