<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EstadosReservas Controller
 *
 * @property \App\Model\Table\EstadosReservasTable $EstadosReservas
 */
class EstadosReservasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $estadosReservas = $this->paginate($this->EstadosReservas);

        $this->set(compact('estadosReservas'));
        $this->set('_serialize', ['estadosReservas']);
    }

    /**
     * View method
     *
     * @param string|null $id Estados Reserva id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estadosReserva = $this->EstadosReservas->get($id, [
            'contain' => []
        ]);

        $this->set('estadosReserva', $estadosReserva);
        $this->set('_serialize', ['estadosReserva']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estadosReserva = $this->EstadosReservas->newEntity();
        if ($this->request->is('post')) {
            $estadosReserva = $this->EstadosReservas->patchEntity($estadosReserva, $this->request->getData());
            if ($this->EstadosReservas->save($estadosReserva)) {
                $this->Flash->success(__('The estados reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estados reserva could not be saved. Please, try again.'));
        }
        $this->set(compact('estadosReserva'));
        $this->set('_serialize', ['estadosReserva']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Estados Reserva id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estadosReserva = $this->EstadosReservas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estadosReserva = $this->EstadosReservas->patchEntity($estadosReserva, $this->request->getData());
            if ($this->EstadosReservas->save($estadosReserva)) {
                $this->Flash->success(__('The estados reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estados reserva could not be saved. Please, try again.'));
        }
        $this->set(compact('estadosReserva'));
        $this->set('_serialize', ['estadosReserva']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Estados Reserva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estadosReserva = $this->EstadosReservas->get($id);
        if ($this->EstadosReservas->delete($estadosReserva)) {
            $this->Flash->success(__('The estados reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The estados reserva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
