<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PagosReserva Controller
 *
 * @property \App\Model\Table\PagosReservaTable $PagosReserva
 */
class PagosReservaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Reservas', 'Users', 'MediosPagos']
        ];
        $pagosReserva = $this->paginate($this->PagosReserva);
        $this->set(compact('pagosReserva'));
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagos Reserva id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagosReserva = $this->PagosReserva->get($id, [
            'contain' => ['Reservas', 'Users', 'MediosPagos']
        ]);

        $this->set('pagosReserva', $pagosReserva);
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($datos=null){        
        $pagosReserva = $this->PagosReserva->newEntity();
        if ($this->request->is('post')) {
            $miPago = array();
            $tarjeta = $this->PagosReserva->Reservas->Users->TarjetasCreditoUser->get($this->request->getData()['tarjeta_id']);
            if ($tarjeta->vencimientoMes == $this->request->getData()['vencimientoMes'] && $tarjeta->vencimientoAnio == $this->request->getData()['vencimientoAnio'] && $tarjeta->codSeguridad == $this->request->getData()['codSeguridad']) {
                $miPago['reserva_id'] = $this->request->getData()['reserva_id'];
                $miPago['tarjeta_id'] = $this->request->getData()['tarjeta_id'];
                $miPago['medio_pago_id'] = $this->request->getData()['medio_pago_id'];
                $miPago['pagado'] = 1;
                $miPago['user_id'] = $this->viewVars['current_user']['id'];
            }
            
            $pagosReserva = $this->PagosReserva->patchEntity($pagosReserva, $miPago);
            if ($lastId = $this->PagosReserva->save($pagosReserva)) {
                $this->Flash->success(__('Se realizó el pago con éxito.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No pudo realizarse el pago. Intente nuevamente.'));
        }
        $reserva = $this->PagosReserva->Reservas->get($datos);
        $tarjetas = $this->PagosReserva->Reservas->Users->TarjetasCreditoUser->find('list', ['limit' => 200])->where(['TarjetasCreditoUser.user_id ='=>$reserva->user_id]);
        $users = $this->PagosReserva->Users->find('list', ['limit' => 200]);
        $mediosPagos = $this->PagosReserva->MediosPagos->find('list', ['limit' => 200]);
        $this->set(compact('pagosReserva', 'reserva', 'users', 'mediosPagos', 'tarjetas'));
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagos Reserva id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagosReserva = $this->PagosReserva->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagosReserva = $this->PagosReserva->patchEntity($pagosReserva, $this->request->getData());
            if ($this->PagosReserva->save($pagosReserva)) {
                $this->Flash->success(__('The pagos reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos reserva could not be saved. Please, try again.'));
        }
        $reservas = $this->PagosReserva->Reservas->find('list', ['limit' => 200]);
        $users = $this->PagosReserva->Users->find('list', ['limit' => 200]);
        $mediosPagos = $this->PagosReserva->MediosPagos->find('list', ['limit' => 200]);
        $this->set(compact('pagosReserva', 'reservas', 'users', 'mediosPagos'));
        $this->set('_serialize', ['pagosReserva']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagos Reserva id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagosReserva = $this->PagosReserva->get($id);
        if ($this->PagosReserva->delete($pagosReserva)) {
            $this->Flash->success(__('The pagos reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The pagos reserva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function efectivo(){
        $pagosReserva = $this->PagosReserva->newEntity();
        if ($this->request->is('post')) {
            $pagosReserva = $this->PagosReserva->patchEntity($pagosReserva, $this->request->getData());
            if ($this->PagosReserva->save($pagosReserva)) {
                $this->Flash->success(__('The pagos reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos reserva could not be saved. Please, try again.'));
        }
        $reservas = $this->PagosReserva->Reservas->find('list', ['limit' => 200]);
        $users = $this->PagosReserva->Users->find('list', ['limit' => 200]);
        $this->set(compact('pagosReserva', 'reservas', 'users'));
        $this->set('_serialize', ['pagosReserva']);
    }
}
