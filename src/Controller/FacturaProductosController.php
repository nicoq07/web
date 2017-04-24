<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FacturaProductos Controller
 *
 * @property \App\Model\Table\FacturaProductosTable $FacturaProductos
 */
class FacturaProductosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Productos', 'Facturas']
        ];
        $facturaProductos = $this->paginate($this->FacturaProductos);

        $this->set(compact('facturaProductos'));
        $this->set('_serialize', ['facturaProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Factura Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $facturaProducto = $this->FacturaProductos->get($id, [
            'contain' => ['Productos', 'Facturas']
        ]);

        $this->set('facturaProducto', $facturaProducto);
        $this->set('_serialize', ['facturaProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $facturaProducto = $this->FacturaProductos->newEntity();
        if ($this->request->is('post')) {
            $facturaProducto = $this->FacturaProductos->patchEntity($facturaProducto, $this->request->getData());
            if ($this->FacturaProductos->save($facturaProducto)) {
                $this->Flash->success(__('The factura producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura producto could not be saved. Please, try again.'));
        }
        $productos = $this->FacturaProductos->Productos->find('list', ['limit' => 200]);
        $facturas = $this->FacturaProductos->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('facturaProducto', 'productos', 'facturas'));
        $this->set('_serialize', ['facturaProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Factura Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $facturaProducto = $this->FacturaProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facturaProducto = $this->FacturaProductos->patchEntity($facturaProducto, $this->request->getData());
            if ($this->FacturaProductos->save($facturaProducto)) {
                $this->Flash->success(__('The factura producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The factura producto could not be saved. Please, try again.'));
        }
        $productos = $this->FacturaProductos->Productos->find('list', ['limit' => 200]);
        $facturas = $this->FacturaProductos->Facturas->find('list', ['limit' => 200]);
        $this->set(compact('facturaProducto', 'productos', 'facturas'));
        $this->set('_serialize', ['facturaProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Factura Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facturaProducto = $this->FacturaProductos->get($id);
        if ($this->FacturaProductos->delete($facturaProducto)) {
            $this->Flash->success(__('The factura producto has been deleted.'));
        } else {
            $this->Flash->error(__('The factura producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
