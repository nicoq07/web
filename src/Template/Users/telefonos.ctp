&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
	<div class="col-lg-6">
		<div class="well">
		<h3><?= h("Mis teléfonos") ?></h3>
		<h3 align="right"><?= $this->Html->link(__('Nuevo'), ['controller' =>'telefonos', 'action' => 'add'], ['class' => 'btn btn-default ']) ?>
</h3>
			    <table class ="table table-striped table-hover" >
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
		                    <?= $this->Html->link(__('Editar'), ['controller' =>'telefonos', 'action' => 'editcliente', $telefono->id], ['class' => 'btn btn-default ']) ?>
	                    	<?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $telefono->id], ['class' => 'btn btn-default '], ['confirm' => __('Seguro de borrar el número # {0}?', $telefono->numero)]) ?>
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