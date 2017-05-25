<?php
use Cake\Chronos\Date;
use Cake\I18n\Time;
?>
&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
	<div class="col-lg-6">
		<div class = "well">
		<h3><?= h("Mis direcciones") ?></h3>
		    <table class ="table table-striped table-hover"  cellpadding="0" cellspacing="0">
		        <thead>
		            <tr>
		                <th scope="col"><?= $this->Paginator->sort('direccion',['label' => 'Dirección']) ?></th>
		                <th scope="col"><?= $this->Paginator->sort('piso') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('localidad_id') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('active',['label' => 'Activo']) ?></th>
		                <th scope="col" class="actions"><?= __('Acciones') ?></th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($user->domicilios as $domicilio): ?>
		            <tr>
		                <td><?= h($domicilio->direccion) ." ". h($domicilio->numero) ?></td>
		                <td><?= h($domicilio->piso) ?></td>
			            <td><?= h($localidades[$domicilio->localidad_id])?></td>
						<td><?= $domicilio->active ? __('Si') : __('No'); ?></td>
		                <td class="actions">
		                    <?= $this->Html->link(__('Editar'), ['controller' =>'domicilios', 'action' => 'edit', $domicilio->id]) ?>
		                    <?= $this->Form->postLink(__('Borrar'), ['controller' =>'domicilios','action' => 'delete', $domicilio->id], ['confirm' => __('Seguro de borrar el domicilio?', $domicilio->id)]) ?>
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
</section>