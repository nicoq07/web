<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * PagosMultas Controller
 *
 * @property \App\Model\Table\PagosMultasTable $PagosMultas
 */
class PagosMultasController extends AppController
{
    public function isAuthorized($user)
    {
        if(isset($user['rol_id']) &&  $user['rol_id'] == BLOQUEADO)
        {
            if(in_array($this->request->action, ['add']))
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
    public function add($id = null)
    {
        $pagosMulta = $this->PagosMultas->newEntity();
        $multasUser = $this->PagosMultas->MultasUser->find('all')->where(['id =' => $id]);
        $multasUser = $multasUser->first();
        if ($this->request->is('post')) {
            $miPago = array();
            $tarjeta = $this->PagosMultas->MultasUser->Users->TarjetasCreditoUser->get($this->request->getData()['tarjeta_id']);
            if ($tarjeta->vencimientoMes == $this->request->getData()['vencimientoMes'] && $tarjeta->vencimientoAnio == $this->request->getData()['vencimientoAnio'] && $tarjeta->codSeguridad == $this->request->getData()['codSeguridad']) {
                $miPago['multas_user_id'] = $this->request->getData()['multas_user_id'];
                $miPago['medio_pago_id'] = $this->request->getData()['medio_pago_id'];
                $miPago['tarjeta_id'] = $this->request->getData()['tarjeta_id'];
                $miPago['monto'] = $this->request->getData()['monto'];
                $miPago['pagado'] = 1;
                $pagosMulta = $this->PagosMultas->patchEntity($pagosMulta, $miPago);
                $pagosMulta->pagado = 1;
                $user = $this->PagosMultas->MultasUser->Users;
                if ($this->PagosMultas->save($pagosMulta)) {
                    $connection= ConnectionManager::get("default");
                    $connection->update('users', [
                        'rol_id' => CLIENTE,
                        'modified' => new \DateTime('now')],
                        [ 'id' => $multasUser->user_id ],
                        ['modified' => 'datetime']);
                    $connection->update('multas_user', [
                        'active' => 0,
                        'modified' => new \DateTime('now')],
                        [ 'id' => $multasUser->id ],
                        ['modified' => 'datetime']);
                    $this->Flash->success(__('El pago se realizó con éxito.'));

                    return $this->redirect(['controller' => 'MultasUser', 'action' => 'index']);
                }
            } else {
                $this->Flash->error(__('Los datos de la tarjeta son incorrectos. Intente nuevamente.'));
            }          
            
            $this->Flash->error(__('No pudo realizarse el pago. Intente nuevamente.'));
        }
        $mediosPagos = $this->PagosMultas->MediosPagos->find('list', ['limit' => 200])->where(['active =' => 1]);
        if (isset($multasUser)) {
            $tarjetas = $this->PagosMultas->MultasUser->Users->TarjetasCreditoUser->find('list', ['limit' => 200])->where(['TarjetasCreditoUser.user_id ='=>$multasUser->user_id, 'active ='=>1]);
        }
        $this->set(compact('pagosMulta', 'multasUser', 'mediosPagos', 'tarjetas'));
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
