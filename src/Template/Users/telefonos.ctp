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
		                <th scope="col"><?= $this->Paginator->sort('Tipo') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('Número') ?></th>
		                <th scope="col"><?= $this->Paginator->sort('Activo') ?></th>
		                <th scope="col" class="actions"><?= __('Actiones') ?></th>
		            </tr>
		        </thead>
		        <tbody>
		            <?php foreach ($user->telefonos as $telefono): ?>
		            <tr>
		            	<td><?= h($tipo[$telefono->tipo_telefono_id])?></td>
		                <td><?= h($telefono->numero) ?></td>
						<td><?= $telefono->active ? __('Si') : __('No'); ?></td>
		                <td class="actions">
		                    <?= $this->Html->link(__('Editar'), ['controller' =>'telefonos', 'action' => 'edit', $telefono->id]) ?>
		                    <?= $this->Form->postLink(__('Borrar'), ['controller' =>'telefonos','action' => 'delete', $telefono->id], ['confirm' => __('Seguro de borrar el domicilio?', $telefono->id)]) ?>
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