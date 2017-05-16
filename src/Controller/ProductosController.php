<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 */
class ProductosController extends AppController
{
	
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['index' , 'home', 'condiciones']);
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RangoEdades', 'Categorias']
        ];
        $productos = $this->paginate($this->Productos);
        $categorias = $this->Productos->Categorias->find('list', ['limit' => 200]);

        $this->set(compact('productos', 'categorias'));
        $this->set('_serialize', ['productos']);
    }

    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producto = $this->Productos->get($id, [
            'contain' => ['RangoEdades', 'Categorias', 'Reservas', 'CalificacionesProductos', 'FacturaProductos', 'FotosProductos']
        ]);

        $this->set('producto', $producto);
        $this->set('_serialize', ['producto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */	
    public function add()
    {	
    	$uploadFile = WWW_ROOT  . 'imagenes' . DS;
    	
    	//$connection = ConnectionManager::get('default');
    
     	
    	
  		if ($this->request->is('post')) 
  		{
         debug($this->request->getData());
   
		  if(!empty($this->request->getData()['foto']['name']))
		    	{
		    		if(!move_uploaded_file($this->request->getData()['foto']['tmp_name'],$uploadFile . $this->request->getData()['foto']['name']))
		    		{
		    			$this->Flash->error("Tenemos un problema para cargar el archivo");
		    		}
			exit();
		    }
  		}
    	
    	
    	
        $producto = $this->Productos->newEntity();
        if ($this->request->is('post')) {
        	
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($this->Productos->save($producto)) {
            		$this->Flash->success(__('The producto has been saved.'));
            		return $this->redirect(['action' => 'index']);
            	}
            	$this->Flash->error(__('The producto could not be saved. Please, try again.'));
            }
            
        
        $rangoEdades = $this->Productos->RangoEdades->find('list', ['limit' => 200]);
        $categorias = $this->Productos->Categorias->find('list', ['limit' => 200]);
//         $reservas = $this->Productos->Reservas->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'rangoEdades', 'categorias'));
        $this->set('_serialize', ['producto']);
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producto = $this->Productos->get($id, [
            'contain' => ['Reservas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto could not be saved. Please, try again.'));
        }
        $rangoEdades = $this->Productos->RangoEdades->find('list', ['limit' => 200]);
        $categorias = $this->Productos->Categorias->find('list', ['limit' => 200]);
        $reservas = $this->Productos->Reservas->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'rangoEdades', 'categorias', 'reservas'));
        $this->set('_serialize', ['producto']);
    }
	
    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Productos->get($id);
        if ($this->Productos->delete($producto)) {
            $this->Flash->success(__('The producto has been deleted.'));
        } else {
            $this->Flash->error(__('The producto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function home()
    {
    	
    }
    
    public function condiciones()
    {
    	
    }    
}
