<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PagosReserva Controller
 *
 * @property \App\Model\Table\PagosReservaTable $PagosReserva
 */
class PagosReservaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Reservas', 'Users', 'MediosPagos']
        ];
        $pagosReserva = $this->paginate($this->PagosReserva);

        $this->set(compact('pagosReserva'));
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagos Reserva id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagosReserva = $this->PagosReserva->get($id, [
            'contain' => ['Reservas', 'Users', 'MediosPagos']
        ]);

        $this->set('pagosReserva', $pagosReserva);
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagosReserva = $this->PagosReserva->newEntity();
        if ($this->request->is('post')) {
            $pagosReserva = $this->PagosReserva->patchEntity($pagosReserva, $this->request->getData());
            if ($this->PagosReserva->save($pagosReserva)) {
                $this->Flash->success(__('The pagos reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos reserva could not be saved. Please, try again.'));
        }
        $reservas = $this->PagosReserva->Reservas->find('list', ['limit' => 200]);
        $users = $this->PagosReserva->Users->find('list', ['limit' => 200]);
        $mediosPagos = $this->PagosReserva->MediosPagos->find('list', ['limit' => 200]);
        $this->set(compact('pagosReserva', 'reservas', 'users', 'mediosPagos'));
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagos Reserva id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagosReserva = $this->PagosReserva->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagosReserva = $this->PagosReserva->patchEntity($pagosReserva, $this->request->getData());
            if ($this->PagosReserva->save($pagosReserva)) {
                $this->Flash->success(__('The pagos reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos reserva could not be saved. Please, try again.'));
        }
        $reservas = $this->PagosReserva->Reservas->find('list', ['limit' => 200]);
        $users = $this->PagosReserva->Users->find('list', ['limit' => 200]);
        $mediosPagos = $this->PagosReserva->MediosPagos->find('list', ['limit' => 200]);
        $this->set(compact('pagosReserva', 'reservas', 'users', 'mediosPagos'));
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagos Reserva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagosReserva = $this->PagosReserva->get($id);
        if ($this->PagosReserva->delete($pagosReserva)) {
            $this->Flash->success(__('The pagos reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The pagos reserva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
