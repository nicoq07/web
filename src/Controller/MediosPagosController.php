<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MediosPagos Controller
 *
 * @property \App\Model\Table\MediosPagosTable $MediosPagos
 */
class MediosPagosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $mediosPagos = $this->paginate($this->MediosPagos);

        $this->set(compact('mediosPagos'));
        $this->set('_serialize', ['mediosPagos']);
    }

    /**
     * View method
     *
     * @param string|null $id Medios Pago id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mediosPago = $this->MediosPagos->get($id, [
            'contain' => []
        ]);

        $this->set('mediosPago', $mediosPago);
        $this->set('_serialize', ['mediosPago']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mediosPago = $this->MediosPagos->newEntity();
        if ($this->request->is('post')) {
            $mediosPago = $this->MediosPagos->patchEntity($mediosPago, $this->request->getData());
            if ($this->MediosPagos->save($mediosPago)) {
                $this->Flash->success(__('The medios pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medios pago could not be saved. Please, try again.'));
        }
        $this->set(compact('mediosPago'));
        $this->set('_serialize', ['mediosPago']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Medios Pago id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mediosPago = $this->MediosPagos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mediosPago = $this->MediosPagos->patchEntity($mediosPago, $this->request->getData());
            if ($this->MediosPagos->save($mediosPago)) {
                $this->Flash->success(__('The medios pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The medios pago could not be saved. Please, try again.'));
        }
        $this->set(compact('mediosPago'));
        $this->set('_serialize', ['mediosPago']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Medios Pago id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mediosPago = $this->MediosPagos->get($id);
        if ($this->MediosPagos->delete($mediosPago)) {
            $this->Flash->success(__('The medios pago has been deleted.'));
        } else {
            $this->Flash->error(__('The medios pago could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
