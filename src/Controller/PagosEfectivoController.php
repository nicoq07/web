<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PagosEfectivo Controller
 *
 * @property \App\Model\Table\PagosEfectivoTable $PagosEfectivo
 */
class PagosEfectivoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reservas', 'Recibos']
        ];
        $pagosEfectivo = $this->paginate($this->PagosEfectivo);

        $this->set(compact('pagosEfectivo'));
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagos Efectivo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagosEfectivo = $this->PagosEfectivo->get($id, [
            'contain' => ['Reservas', 'Recibos']
        ]);

        $this->set('pagosEfectivo', $pagosEfectivo);
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagosEfectivo = $this->PagosEfectivo->newEntity();
        if ($this->request->is('post')) {
            $pagosEfectivo = $this->PagosEfectivo->patchEntity($pagosEfectivo, $this->request->getData());
            if ($this->PagosEfectivo->save($pagosEfectivo)) {
                $this->Flash->success(__('The pagos efectivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos efectivo could not be saved. Please, try again.'));
        }
        $reservas = $this->PagosEfectivo->Reservas->find('list', ['limit' => 200]);
        $recibos = $this->PagosEfectivo->Recibos->find('list', ['limit' => 200]);
        $this->set(compact('pagosEfectivo', 'reservas', 'recibos'));
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagos Efectivo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagosEfectivo = $this->PagosEfectivo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagosEfectivo = $this->PagosEfectivo->patchEntity($pagosEfectivo, $this->request->getData());
            if ($this->PagosEfectivo->save($pagosEfectivo)) {
                $this->Flash->success(__('The pagos efectivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos efectivo could not be saved. Please, try again.'));
        }
        $reservas = $this->PagosEfectivo->Reservas->find('list', ['limit' => 200]);
        $recibos = $this->PagosEfectivo->Recibos->find('list', ['limit' => 200]);
        $this->set(compact('pagosEfectivo', 'reservas', 'recibos'));
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagos Efectivo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagosEfectivo = $this->PagosEfectivo->get($id);
        if ($this->PagosEfectivo->delete($pagosEfectivo)) {
            $this->Flash->success(__('The pagos efectivo has been deleted.'));
        } else {
            $this->Flash->error(__('The pagos efectivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
