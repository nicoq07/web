<?php
namespace App\Controller;


use App\Controller\AppController;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add', 'contact']);
	}
	
	public function isAuthorized($user)
    {
        if(isset($user['rol_id']) &&  ($user['rol_id'] == CLIENTE || $user['rol_id'] == BLOQUEADO))
        {
            if(in_array($this->request->action, ['index','view','logout','login','home','perfil',
                                'direcciones','reservas','pagos','telefonos','tarjetas',
                                'contact'
            ]))
            {
                return true;
            }
        }
        elseif (isset($user['rol_id']) && $user['rol_id'] == EMPLEADO) {
            if(in_array($this->request->action, ['index','view','logout','login','home','perfil',
                                'direcciones','reservas','pagos','telefonos','tarjetas',
                                'contact'
            ]))
            {
                return true;
            }
        }
        
        return parent::isAuthorized($user);

        return true;
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'CalificacionesProductos', 'Domicilios', 'MultasUser', 'PagosReserva', 'Reservas', 'Telefonos']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
        	$user = $this->Users->patchEntity($user, $this->request->getData());
        	
        	if (!$this->Auth->user())
        	{	
        		$user->rol_id = CLIENTE;
        		$user->active = true;
        	}
            if ($this->Users->save($user)) 
            {
            	$this->Flash->success("Usuario creado");
            	
            	if (!$this->Auth->user())
            	{
            		$user = $this->Auth->identify();
            		if($user)
            		{
            			$this->Auth->setUser($user);
            			return $this->redirect($this->Auth->redirectUrl());
            		}
            		
            	}
            	return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al crear el usuario, por favor reintente!'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Datos actualizados.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Los datos no pudieron actualizarse.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    	
    public function cambiarpassword($id = null)
    {
    	$user = $this->Users->get($id, [
    			'contain' => []
    	]);
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$user = $this->Users->patchEntity($user, $this->request->getData());
    		if ($this->Users->save($user)) {
    			$this->Flash->success(__('Contraseña actualizada!'));
    			
    			return $this->redirect($this->referer());
    		}
    		$this->Flash->error(__('Tenemos un problema para cambiar tu contraseña. Reintentá!'));
    	}
    	$this->set(compact('user'));
    	$this->set('_serialize', ['user']);
    }
    
    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function desactivar($id = null)
    {
    	if ($this->request->is(['patch', 'post', 'put'])) {
    		$user= $this->Users->get($id);
    		$user->active = false;
    		if ($this->Users->save($user)) {
    			$this->Flash->success(__('Usuario desactivado'));
    			return $this->redirect($this->referer());
    		}
    		$this->Flash->error(__('El Usuario no pudo desactivarse, reintente!'));
    	}
    }
    
    public function login()
    {
    	if($this->request->is('post'))
    	{
    		$user = $this->Auth->identify();
    		if($user)
    		{
    			$this->Auth->setUser($user);
    			return $this->redirect($this->Auth->redirectUrl());
    		}
    		else
    		{
    			$this->Flash->error('Datos invalidos, por favor intente nuevamente', ['key' => 'auth']);
    		}
    	}
    	if ($this->Auth->user())
    	{
    		return $this->redirect(['controller' => 'Productos', 'action' => 'home']);
    	}
    }
    public function logout()
    {
    	return $this->redirect($this->Auth->logout());
    }

    public function admin()
    {
        
    }
    
    public function home()
    {
    	
    }
    
    public function perfil()
    {
    	$user = $this->Auth->user();
    	if($user)
    	{
    		$user = $this->Users->get($user['id']);
    		    	}
    	$this->set('user', $user);
    	$this->set('_serialize', ['user']);
    }
    
    public function direcciones()
    {
    	$user = $this->Auth->user();
    	if($user)
    	{
    		$user = $this->Users->get($user['id'], [
    				'contain' => ['Domicilios'=> function ($q) {
    				return $q
    				->where(['Domicilios.active' => true]);
    				}]
    		]);
    	}
    	
    	$localidades = $this->Users->Domicilios->Localidades->find('list')->toArray();
    	$this->set(compact('user','localidades'));
    	$this->set('_serialize', ['user']);
    }
    
    public function reservas()
    {
    	$user = $this->Auth->user();
    	if($user)
    	{
    		$reservas = $this->Users->Reservas->find()->where(['user_id'=>$user['id']])->contain(['Productos','EstadosReservas'])->all();
    		
    	}
    	//$productos = $this->Users->Reservas->ReservasProductos->find();
    	
//     	debug($productos);
//     	exit();
    	//$estados = $this->Users->Reservas->EstadosReservas->find('list')->toArray();
    	$this->set(compact('reservas'));
    	//$this->set('_serialize', ['user']);
    }
    
    public function pagos()
    {
    	$user = $this->Auth->user();
    	if($user)
    	{
    		$user = $this->Users->get($user['id'], [
    				'contain' => ['PagosReserva']
    		]);
    	}
    	$medio = $this->Users->PagosReserva->MediosPagos->find('list')->toArray();
    	$this->set(compact('user','medio'));
    	$this->set('_serialize', ['user']);
    }
    
    public function telefonos()
    {
    	$user = $this->Auth->user();
    	if($user)
    	{
    		$user = $this->Users->get($user['id'], [
    				'contain' => ['Telefonos']
    		]);
    	}
    	$tipo = $this->Users->Telefonos->TipoTelefonos->find('list')->toArray();
    	$this->set(compact('user','tipo'));
    	$this->set('_serialize', ['user']);
    }
    
    public function tarjetas()
    {
    	$user = $this->Auth->user();
    	if($user)
    	{
    		$user = $this->Users->get($user['id'], [
    				'contain' => ['TarjetasCreditoUser'=> function ($q) {
    				return $q
    				->where(['TarjetasCreditoUser.active' => true]);
    				}]
    		]);
    		
    		
    		
    	}
    	$this->set(compact('user'));
    	$this->set('_serialize', ['user']);
    }
    
}
