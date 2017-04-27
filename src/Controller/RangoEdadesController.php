<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RangoEdades Controller
 *
 * @property \App\Model\Table\RangoEdadesTable $RangoEdades
 */
class RangoEdadesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $rangoEdades = $this->paginate($this->RangoEdades);

        $this->set(compact('rangoEdades'));
        $this->set('_serialize', ['rangoEdades']);
    }

    /**
     * View method
     *
     * @param string|null $id Rango Edade id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rangoEdade = $this->RangoEdades->get($id, [
            'contain' => []
        ]);

        $this->set('rangoEdade', $rangoEdade);
        $this->set('_serialize', ['rangoEdade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rangoEdade = $this->RangoEdades->newEntity();
        if ($this->request->is('post')) {
            $rangoEdade = $this->RangoEdades->patchEntity($rangoEdade, $this->request->getData());
            if ($this->RangoEdades->save($rangoEdade)) {
                $this->Flash->success(__('The rango edade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rango edade could not be saved. Please, try again.'));
        }
        $this->set(compact('rangoEdade'));
        $this->set('_serialize', ['rangoEdade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rango Edade id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rangoEdade = $this->RangoEdades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rangoEdade = $this->RangoEdades->patchEntity($rangoEdade, $this->request->getData());
            if ($this->RangoEdades->save($rangoEdade)) {
                $this->Flash->success(__('The rango edade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rango edade could not be saved. Please, try again.'));
        }
        $this->set(compact('rangoEdade'));
        $this->set('_serialize', ['rangoEdade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rango Edade id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rangoEdade = $this->RangoEdades->get($id);
        if ($this->RangoEdades->delete($rangoEdade)) {
            $this->Flash->success(__('The rango edade has been deleted.'));
        } else {
            $this->Flash->error(__('The rango edade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
