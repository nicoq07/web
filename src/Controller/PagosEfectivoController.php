<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * PagosEfectivo Controller
 *
 * @property \App\Model\Table\PagosEfectivoTable $PagosEfectivo
 */
class PagosEfectivoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Reservas', 'Recibos']
        ];
        $pagosEfectivo = $this->paginate($this->PagosEfectivo);

        $this->set(compact('pagosEfectivo'));
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * View method
     *
     * @param string|null $id Pagos Efectivo id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagosEfectivo = $this->PagosEfectivo->get($id, [
            'contain' => ['Reservas', 'Recibos']
        ]);

        $this->set('pagosEfectivo', $pagosEfectivo);
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagosEfectivo = $this->PagosEfectivo->newEntity();
        if ($this->request->is('post')) {
            $reserva = $this->PagosEfectivo->Reservas->find("all")->where(['id =' => $this->request->getData()['reserva_id']]);
            $reserva = $reserva->first();
            if (isset($reserva)) {
                $factura = $this->PagosEfectivo->Reservas->Facturas->find("all")->where(['reserva_id'=>$reserva->id]);
                $factura = $factura->first();
                $entidadRecibo = TableRegistry::get('Recibos');
                $recibo = $entidadRecibo->newEntity();
                $recibo->factura_id = $factura->id;
                $recibo->monto = $this->request->getData()['monto'];
                $lastId = $entidadRecibo->save($recibo);
                $this->actulizarFactura($factura->id, $this->request->getData()['monto']);
                $this->actualizarEstados($factura->id, $reserva->id);
                $miPago = array();
                $miPago['reserva_id'] = $reserva->id;
                $miPago['recibo_id'] = $lastId->id;
                $miPago['active'] = 1;
                $pagosEfectivo = $this->PagosEfectivo->patchEntity($pagosEfectivo, $miPago);
                if ($this->PagosEfectivo->save($pagosEfectivo)) {
                    $this->Flash->success(__('El pago se realizó con éxito.'));

                    return $this->redirect(['action' => 'index']);
                }
            } else {
                $this->Flash->error(__('El número de reserva reserva no existe, reintente por favor.'));
                return $this->redirect(['action' => 'add']);
            }

            
            $this->Flash->error(__('El pago no pudo realizarse. reintente por favor.'));
        }
        $reservas = $this->PagosEfectivo->Reservas->find('list', ['limit' => 200]);
        $recibos = $this->PagosEfectivo->Recibos->find('list', ['limit' => 200]);
        $this->set(compact('pagosEfectivo', 'reservas', 'recibos'));
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pagos Efectivo id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagosEfectivo = $this->PagosEfectivo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagosEfectivo = $this->PagosEfectivo->patchEntity($pagosEfectivo, $this->request->getData());
            if ($this->PagosEfectivo->save($pagosEfectivo)) {
                $this->Flash->success(__('The pagos efectivo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pagos efectivo could not be saved. Please, try again.'));
        }
        $reservas = $this->PagosEfectivo->Reservas->find('list', ['limit' => 200]);
        $recibos = $this->PagosEfectivo->Recibos->find('list', ['limit' => 200]);
        $this->set(compact('pagosEfectivo', 'reservas', 'recibos'));
        $this->set('_serialize', ['pagosEfectivo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pagos Efectivo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagosEfectivo = $this->PagosEfectivo->get($id);
        if ($this->PagosEfectivo->delete($pagosEfectivo)) {
            $this->Flash->success(__('The pagos efectivo has been deleted.'));
        } else {
            $this->Flash->error(__('The pagos efectivo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function actulizarFactura($idFactura, $monto){
        $factura = $this->PagosEfectivo->Reservas->Facturas->get($idFactura);
        $porcentajePago = $monto / $factura->monto;

        $connection= ConnectionManager::get("default");
        $connection->update('facturas', [
            'porcentajePago' => $factura->porcentajePago + $porcentajePago,
            'pagado' => 0,
            'modified' => new \DateTime('now')],
            [ 'id' => $idFactura ],
            ['modified' => 'datetime']);
    }

    public function actualizarEstados($idFactura, $idReserva){
        $connection= ConnectionManager::get("default");
        $factura = $this->PagosEfectivo->Reservas->Facturas->get($idFactura);
        $estadoReserva;
        if ($factura->porcentajePago == 1) {
            $connection->update('facturas', [
            'pagado' => 1,
            'modified' => new \DateTime('now')],
            [ 'id' => $idFactura ],
            ['modified' => 'datetime']);
            $estadoReserva = 3;
        } else {
            $estadoReserva = 2;
        }

        $connection->update('reservas', [
        'estado_reserva_id' => $estadoReserva,
        'modified' => new \DateTime('now')],
        [ 'id' => $idReserva ],
        ['modified' => 'datetime']);
    }
}
