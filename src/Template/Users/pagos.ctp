&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
	<div class="col-lg-6">
		<div class="well">
			    <table class ="table table-striped table-hover"  cellpadding="0" cellspacing="0">
		        <thead>
		            <tr>
		                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('piso') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('localidad_id') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
		                <th scope="col" class="actions"><?= __('Actions') ?></th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($user->pagos_reserva as $pago): ?>
		            <tr>
		                <td><?= h($pago->direccion) ." ". h($pago->numero) ?></td>
		                <td><?= h($pago->piso) ?></td>
			            <td><?= h($localidades[$pago->localidad_id])?></td>
						<td><?= $pago->active ? __('Si') : __('No'); ?></td>
		                <td class="actions">
		                    <?= $this->Html->link(__('Editar'), ['controller' =>'domicilios', 'action' => 'edit', $pago->id]) ?>
		                    <?= $this->Form->postLink(__('Borrar'), ['controller' =>'domicilios','action' => 'delete', $pago->id], ['confirm' => __('Seguro de borrar el domicilio?', $pago->id)]) ?>
		                </td>
		            </tr>
		            <?php endforeach; ?>
		        </tbody>
    		</table>
	    </div>
	</div>
	
	
</div>
<section class="duplicatable-content bkg">
	<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h6>&nbsp;</h6>
</section>