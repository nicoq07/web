<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

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
        $fotoProductos = $this->Productos->FotosProductos->find();
        $fotos = $fotoProductos->toArray();
		$this->set(compact('productos', 'categorias', 'fotos'));
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
        $producto = $this->Productos->newEntity();
        if ($this->request->is('post')) {
        	
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($lastId = $this->Productos->save($producto))
            {
            		$this->guardarImg($this->request->getData()['foto'], $lastId->id);
            		$this->Flash->success(__('Producto guardado.'));
            		return $this->redirect(['action' => 'index']);
            	}
            	$this->Flash->error(__('Error al cargar el producto, reintente por favor!.'));
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

    public function agregarCarro($id = null)
    {
        $this->autoRender = false;

        $session = $this->request->session();
        $allProducts = $session->read('cart');
        if (null!=$allProducts) {
            if (array_key_exists($id, $allProducts)) {
                $allProducts[$id]++;
            } else {
                $allProducts[$id] = 1;
            }
        } else {
            $allProducts[$id] = 1;
        }
        $session->write('cart', $allProducts);         
        $this->Flash->success(__('Producto agregado al carrito.'));
        return $this->redirect($this->referer());

    }
    
    private function guardarImg($data, $idProd)
    {
    	$uploadFile = WWW_ROOT  . 'imagenes' . DS;
    	if(!empty($data))
    	{
    		$connection= ConnectionManager::get("default");
    		foreach ($data as $img)
    		{
    			$referencia = $uploadFile .  "IdProd-".$idProd. "-"  .$img['name'];
    			
    			if(!move_uploaded_file($img['tmp_name'],$referencia))
    			{
    				$this->Flash->error("Tenemos un problema para cargar las imagenes");
    			}
    			$referencia = "webroot". DS . 'imagenes' . DS .  "IdProd-".$idProd. "-"  .$img['name'];
    			$connection->insert('fotos_productos', [
    					'producto_id' => $idProd,
    					'referencia' => $referencia,
    					'modified' => new \DateTime('now'),
    					'created' => new \DateTime('now')], ['created' => 'datetime' , 'modified' => 'datetime']);
    		}
    		
    	}
    }
    
}
