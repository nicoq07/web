<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PagosMultas Controller
 *
 * @property \App\Model\Table\PagosMultasTable $PagosMultas
 */
class PagosMultasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MultasUser', 'MediosPagos']
        ];
        $pagosMultas = $this->paginate($this->PagosMultas);

        $this->set(compact('pagosMultas'));
        $this->set('_serialize', ['pagosMultas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagos Multa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagosMulta = $this->PagosMultas->get($id, [
            'contain' => ['MultasUser', 'MediosPagos']
        ]);

        $this->set('pagosMulta', $pagosMulta);
        $this->set('_serialize', ['pagosMulta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagosMulta = $this->PagosMultas->newEntity();
        if ($this->request->is('post')) {
            $pagosMulta = $this->PagosMultas->patchEntity($pagosMulta, $this->request->getData());
            if ($this->PagosMultas->save($pagosMulta)) {
                $this->Flash->success(__('The pagos multa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos multa could not be saved. Please, try again.'));
        }
        $multasUser = $this->PagosMultas->MultasUser->find('list', ['limit' => 200]);
        $mediosPagos = $this->PagosMultas->MediosPagos->find('list', ['limit' => 200]);
        $this->set(compact('pagosMulta', 'multasUser', 'mediosPagos'));
        $this->set('_serialize', ['pagosMulta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagos Multa id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagosMulta = $this->PagosMultas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagosMulta = $this->PagosMultas->patchEntity($pagosMulta, $this->request->getData());
            if ($this->PagosMultas->save($pagosMulta)) {
                $this->Flash->success(__('The pagos multa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos multa could not be saved. Please, try again.'));
        }
        $multasUser = $this->PagosMultas->MultasUser->find('list', ['limit' => 200]);
        $mediosPagos = $this->PagosMultas->MediosPagos->find('list', ['limit' => 200]);
        $this->set(compact('pagosMulta', 'multasUser', 'mediosPagos'));
        $this->set('_serialize', ['pagosMulta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagos Multa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagosMulta = $this->PagosMultas->get($id);
        if ($this->PagosMultas->delete($pagosMulta)) {
            $this->Flash->success(__('The pagos multa has been deleted.'));
        } else {
            $this->Flash->error(__('The pagos multa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
