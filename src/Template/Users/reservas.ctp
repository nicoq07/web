&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
	<div class="col-lg-7">
		<div class="well">
			<h3><?= h("Mis reservas") ?></h3>
			    <table class ="table table-striped table-hover"  >
			        <thead>
			            <tr>
			                <th scope="col"><?= $this->Paginator->sort('id', ['label' => 'Código']) ?></th>
			                <th scope="col"><?= $this->Paginator->sort('estado_reserva_id',['label' => 'Estado']) ?></th>
			                <th scope="col"><?= h('Cantidad de productos') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('Fecha inicio') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('Fecha fin') ?></th>
			                <th scope="col" class="actions"><?= __('Actions') ?></th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php foreach ($user->reservas as $reserva): ?>
			            <tr>
			                <td><?= h($reserva->id)  ?></td>
			                <td><?= h($estados[$reserva->estado_reserva_id]) ?></td>
				            <td title="Productos:&#10;<?php foreach ($productos as $pro) { echo "-". $pro . "&#10;"; }?>" align="center"><?= h(count($productos))?>	</td>
				            <td><?= h($reserva->fecha_inicio->format('d-m-Y H:i a'))  ?></td>
				            <td><?= h($reserva->fecha_fin->format('d-m-Y H:i a'))  ?></td>
			                <td class="actions">
			                    <?= $this->Form->postLink(__('Cancelar'), ['controller' =>'reservas','action' => 'delete', $reserva->id], ['confirm' => __('Seguro de borrar el domicilio?', $reserva->id)]) ?>
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