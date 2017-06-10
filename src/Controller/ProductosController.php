<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\Time;
use Cake\I18n\Date;

/**
 * Productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 */
class ProductosController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == CLIENTE)
		{
			if(in_array($this->request->action, ['agregarCarro']))
			{
				return true;
			}
		}
		elseif (isset($user['rol_id']) && $user['rol_id'] == EMPLEADO) {
			
			return true;
		}
		
		return parent::isAuthorized($user);
		
		return true;
	}
	
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['index' , 'home', 'condiciones','view']);
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {        
        $where = null;
        if (!(empty($this->request->getData()['categoria_id'])))
        {
            $categoria=$this->request->getData()['categoria_id'];
            $where = ['productos.categoria_id' => $categoria];
        }
        $orden = null;
        if (!(empty($this->request->getData()['precio_ord'])))
        {
            $orden=$this->request->getData()['precio_ord'];
        }
        $this->paginate = [
            'contain' => ['RangoEdades', 'Categorias'],
            'conditions' => [$where],
            'order' => [
            'Productos.precio' => $orden
            ]
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
        'contain' => ['RangoEdades', 'Categorias', 'Reservas', 'CalificacionesProductos', 'FacturaProductos', 'FotosProductos']]);  

        if ($this->request->is(['put'])) {
            $entidadCalificacion = TableRegistry::get('CalificacionesProductos');
            $calificacion = $entidadCalificacion->newEntity();
            $calificacion->calificacion = $this->request->getData()['calificacion'];
            $calificacion->comentario = $this->request->getData()['comentario'];
            $calificacion->user_id = $this->viewVars['current_user']['id'];
            $calificacion->producto_id = $id;
            $calificacion->active = 1;
            $calificacion->created = new \DateTime('now');
            $calificacion->modified = new \DateTime('now');

            if ($entidadCalificacion->save($calificacion))
            {
                $this->Flash->success(__('Calificación guardada.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al calificar el producto, reintente por favor.'));
        }

        $conn = ConnectionManager::get('default');
        $diasDisponibles = array();
        for ($i = 0; $i < 15; $i++) {
            $stmt = $conn->execute('select DATE_ADD(CURRENT_DATE, INTERVAL '.$i.' DAY) as fecha');
            $resu = $stmt ->fetchAll('assoc');
            $fecha = $resu[0]['fecha'];
            $diasDisponibles[] = $fecha;
        }

        $conn = ConnectionManager::get('default');   
        $usoProdu = 0;
        $miquery2 = "SELECT 1 from productos, reservas_productos, reservas, users
        where productos.id =".$id." 
        AND productos.id = reservas_productos.producto_id 
        AND reservas_productos.reserva_id = reservas.id 
        AND reservas.user_id =".$this->viewVars['current_user']['id'];
        $stmt = $conn->execute($miquery2);
        $resu = $stmt ->fetchAll('assoc');
        if(sizeof($resu) == 0){
            $usoProdu = 0;
        }                    
        else
        {
            $usoProdu = 1;
        }

        $cantidadProdu = $producto['cantidad'];
        $tabla = array();
        foreach($diasDisponibles as $dia)
        {
            $disponibilidad = array();
            for ($i = 9; $i < 23; $i++) {   
                $miquery = "SELECT productos.id, sum(reservas_productos.cantidad) as micantidad
                from productos, reservas, reservas_productos 
                where '".$dia." ".$i.":00:00' between reservas.no_disponible_inicio AND reservas.no_disponible_fin
                AND productos.id =".$id."
                AND productos.id = reservas_productos.producto_id
                AND reservas.id = reservas_productos.reserva_id
                group by productos.id";
                $stmt = $conn->execute($miquery);
                $resu = $stmt ->fetchAll('assoc');       
                if(sizeof($resu) == 0){
                    $disponibilidad[$i] = 0;
                }                    
                else
                {
                    $cantidad = $resu[0]['micantidad'];
                    if ((int)$cantidad >= (int)$cantidadProdu){
                        $disponibilidad[$i] = 2;
                    }
                    else {
                        $disponibilidad[$i] = 1;   
                    }
                }
            }    
            $tabla[$dia] = $disponibilidad;          
        }

        $this->set(compact('producto', 'tabla', 'usoProdu'));
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
//     	debug($this->request->getData());
        $producto = $this->Productos->get($id, [
            'contain' => ['FotosProductos']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
        	
        	if (!empty($this->request->getData()['borrarFoto']))
        	{
        		$id = $this->request->getData()['borrarFoto'];
        		$fotoEntity = TableRegistry::get('FotosProductos');
        		$foto = $fotoEntity->get($id);
        		if ($fotoEntity->delete($foto)) {
        			
        			$this->Flash->success(__('Foto borrada.'));
        			return $this->redirect($this->referer());
        		} else 
        		{
        			return $this->redirect($this->referer());
        			$this->Flash->error(__('Error al intentar borrar la foto, reintente!'));
        		}
        	}
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            $this->guardarImg($this->request->getData()['foto'], $producto->id);
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('The producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The producto could not be saved. Please, try again.'));
        }
        $rangoEdades = $this->Productos->RangoEdades->find('list', ['limit' => 200]);
        $categorias = $this->Productos->Categorias->find('list', ['limit' => 200]);
//         $fotos = $this->Productos->FotosProductos->find('list', ['limit' => 200]);
        $this->set(compact('producto', 'rangoEdades', 'categorias'));
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
    	$productos = $this->Productos->find('all', ['order'=>['created'=>'DESC'], 'limit'=>3, 'contain' => ['FotosProductos']]);
        $this->set('productos', $productos);
    }
    
    public function condiciones()
    {
    	
    }   

    public function agregarCarro($id = null)
    {
        $this->autoRender = false;
        $producto = $this->Productos->get($id);

        $session = $this->request->session();
        $allProducts = $session->read('cart');
        if (null!=$allProducts) {
            if (array_key_exists($id, $allProducts)) {
                if ($allProducts[$id] == $producto['cantidad']){
                    $this->Flash->error(__('Ya pediste el máximo de stock que tiene el producto '.$producto['descripcion']));
                    return $this->redirect($this->referer());
                }
                else
                    $allProducts[$id]++;
            } else {
                $allProducts[$id] = 1;
            }
        } else {
            $allProducts[$id] = 1;
        }
        $session->write('cart', $allProducts);         
        $this->Flash->success(__($producto['descripcion'].' agregado al carrito. Cantidad actual: '.$allProducts[$id]));
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
