<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FotosProductos Controller
 *
 * @property \App\Model\Table\FotosProductosTable $FotosProductos
 */
class FotosProductosController extends AppController
{
	public function isAuthorized($user)
	{
		if(isset($user['rol_id']) &&  $user['rol_id'] == CLIENTE)
		{
			return false;
		}
		elseif (isset($user['rol_id']) && $user['rol_id'] == EMPLEADO) {
			
			return true;
		}
		
		return parent::isAuthorized($user);
		
		return true;
	}
// 	public function beforeFilter() {
// 		parent::beforeFilter();
		
// 		// Change layout for Ajax requests
// 		if ($this->request->is('ajax')) {
// 			$this->layout = 'ajax';
// 		}
// 	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Productos']
        ];
        $fotosProductos = $this->paginate($this->FotosProductos);

        $this->set(compact('fotosProductos'));
        $this->set('_serialize', ['fotosProductos']);
    }

    /**
     * View method
     *
     * @param string|null $id Fotos Producto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fotosProducto = $this->FotosProductos->get($id, [
            'contain' => ['Productos']
        ]);

        $this->set('fotosProducto', $fotosProducto);
        $this->set('_serialize', ['fotosProducto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fotosProducto = $this->FotosProductos->newEntity();
        if ($this->request->is('post')) {
            $fotosProducto = $this->FotosProductos->patchEntity($fotosProducto, $this->request->getData());
            if ($this->FotosProductos->save($fotosProducto)) {
                $this->Flash->success(__('The fotos producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos producto could not be saved. Please, try again.'));
        }
        $productos = $this->FotosProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('fotosProducto', 'productos'));
        $this->set('_serialize', ['fotosProducto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fotos Producto id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fotosProducto = $this->FotosProductos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fotosProducto = $this->FotosProductos->patchEntity($fotosProducto, $this->request->getData());
            if ($this->FotosProductos->save($fotosProducto)) {
                $this->Flash->success(__('The fotos producto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fotos producto could not be saved. Please, try again.'));
        }
        $productos = $this->FotosProductos->Productos->find('list', ['limit' => 200]);
        $this->set(compact('fotosProducto', 'productos'));
        $this->set('_serialize', ['fotosProducto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fotos Producto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    	
    	$data = [];
//     	echo "a";
//     	$emp=$this->Employees->newEntity();
//     	if($this->request->is('ajax')) {
//     		$this->request->getData['id']=$id;
//     	}
    	
    	
    	
    	
//     	if ($this->request->is('ajax')) {
//     		$this->autoRender = false;
//     		$this->layout = null;
    		
//     		$response = array();
    		
//     		if ($this->FotosProductos->delete($id)) {
//     			$response['success'] = false;
//     			$response['message'] = __('User deleted');
// //     			$response['redirect'] = Router::url(array('action' => 'index'));
//     		} else {
//     			$response['success'] = true;
//     			$response['message'] = __('User was not deleted');
// //     			$response['redirect'] = Router::url(array('action' => 'index'));
//     		}
    		
//     		echo json_encode($response);
//     	}
    	
//     	echo json_encode("hola");
		
//         $this->request->allowMethod(['post', 'delete']);
//         $fotosProducto = $this->FotosProductos->get($id);
//         if ($this->FotosProductos->delete($fotosProducto)) {
//             $this->Flash->success(__('The fotos producto has been deleted.'));
//         } else {
//             $this->Flash->error(__('The fotos producto could not be deleted. Please, try again.'));
//         }
         $this->autoRender = false;
//         return $this->redirect(['action' => 'index']);
    }
    
    public function ajax_get_time() {
    	$this->request->onlyAllow('ajax'); // No direct access via browser URL
    	
    	$content = '<div class="alert alert-warning" role="alert">Something unexpected occured</div>';
    	
    	if ($this->request->is('post')) 
    	{
    		
    		$this->Timezone->set($this->request->data);
    		if($this->Timezone->validates()){
    			
    			
    		}else{
    			$errors = $this->Timezone->validationErrors;
    			$flatErrors = Set::flatten($errors);
    			if(count($errors) > 0) {
    				$content = '<div class="alert alert-danger" role="alert">Could not get timezone. The following errors occurred: ';
    				$content .= '<ul>';
    				foreach($flatErrors as $key => $value) {
    					$content .= '<li><strong>'.$value.'</strong></li>';
    				}
    				$content .= '</ul>';
    				$content .= '</div>';
    			}
    		}
    		
    	}
    	$this->autoRender = false;
    	
    	
    }
}
