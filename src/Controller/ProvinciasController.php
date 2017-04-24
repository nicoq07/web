<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Provincias Controller
 *
 * @property \App\Model\Table\ProvinciasTable $Provincias
 */
class ProvinciasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Paises']
        ];
        $provincias = $this->paginate($this->Provincias);

        $this->set(compact('provincias'));
        $this->set('_serialize', ['provincias']);
    }

    /**
     * View method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provincia = $this->Provincias->get($id, [
            'contain' => ['Paises', 'Localidades']
        ]);

        $this->set('provincia', $provincia);
        $this->set('_serialize', ['provincia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provincia = $this->Provincias->newEntity();
        if ($this->request->is('post')) {
            $provincia = $this->Provincias->patchEntity($provincia, $this->request->getData());
            if ($this->Provincias->save($provincia)) {
                $this->Flash->success(__('The provincia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provincia could not be saved. Please, try again.'));
        }
        $paises = $this->Provincias->Paises->find('list', ['limit' => 200]);
        $this->set(compact('provincia', 'paises'));
        $this->set('_serialize', ['provincia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provincia = $this->Provincias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provincia = $this->Provincias->patchEntity($provincia, $this->request->getData());
            if ($this->Provincias->save($provincia)) {
                $this->Flash->success(__('The provincia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The provincia could not be saved. Please, try again.'));
        }
        $paises = $this->Provincias->Paises->find('list', ['limit' => 200]);
        $this->set(compact('provincia', 'paises'));
        $this->set('_serialize', ['provincia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Provincia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provincia = $this->Provincias->get($id);
        if ($this->Provincias->delete($provincia)) {
            $this->Flash->success(__('The provincia has been deleted.'));
        } else {
            $this->Flash->error(__('The provincia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
