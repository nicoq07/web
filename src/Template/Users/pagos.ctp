&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
	<div class="col-lg-6">
		<div class="well">
		<h3><?= h("Mis pagos") ?></h3>
			    <table class ="table table-striped table-hover"  cellpadding="0" cellspacing="0">
		        <thead>
		            <tr>
		                <th scope="col"><?= $this->Paginator->sort('id', ['Cod Reserva']) ?></th>
		                <th scope="col"><?= h("Método de pago") ?></th>
		                <th scope="col"><?= $this->Paginator->sort('pagado') ?></th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($user->pagos_reserva as $pago): ?>
		            <tr>
		                <td><?= h($pago->reserva_id) ?></td>
		                <td><?= $medio[$pago->medio_pago_id]; ?></td>
						<td><?= $pago->pagado ? __('Si') : __('No'); ?></td>
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