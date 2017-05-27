<div class="row">
<h5>&nbsp;</h5>
	<div class="col-lg-8 col-lg-offset-2">
	    <h3><?= __('Telefonos') ?></h3>
	    <table class ="table table-striped table-hover">
	        <thead>
	            <tr>
	                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('tipo_telefono_id', ['label' => 'Tipo de teléfono' ]) ?></th>
	                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
	                <th scope="col"><?= $this->Paginator->sort('created', ['label' => 'Creado' ]) ?></th>
	                <th scope="col"><?= $this->Paginator->sort('modified', ['label' => 'Actualizado' ]) ?></th>
	                <th scope="col"><?= $this->Paginator->sort('active', ['label' => 'Activo' ]) ?></th>
	                <th scope="col" class="actions"><?= __('Acciones') ?></th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php foreach ($telefonos as $telefono): ?>
	            <tr>
	                <td><?= $telefono->has('user') ? $this->Html->link($telefono->user->presentacion, ['controller' => 'Users', 'action' => 'view', $telefono->user->id]) : '' ?></td>
	                <td><?= $telefono->has('tipo_telefono') ? $this->Html->link($telefono->tipo_telefono->descripcion, ['controller' => 'TipoTelefonos', 'action' => 'view', $telefono->tipo_telefono->id]) : '' ?></td>
	                <td><?= h($telefono->numero) ?></td>
	                <td><?= h($telefono->created->format('d-m-Y')) ?></td>
	                <td><?= h($telefono->modified->format('d-m-Y')) ?></td>
	                <td><?= $telefono->active ? h('Sí') : h('No')?></td>
	                <td class="actions">
	                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $telefono->id]) ?>
	                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $telefono->id], ['confirm' => __('Seguro de borrar el número # {0}?', $telefono->numero)]) ?>
	                </td>
	            </tr>
	            <?php endforeach; ?>
	        </tbody>
	    </table>
	    <div class="paginator">
	        <ul class="pagination">
	            <?= $this->Paginator->first('<< ' . __('first')) ?>
	            <?= $this->Paginator->prev('< ' . __('previous')) ?>
	            <?= $this->Paginator->numbers() ?>
	            <?= $this->Paginator->next(__('next') . ' >') ?>
	            <?= $this->Paginator->last(__('last') . ' >>') ?>
	        </ul>
	        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
	    </div>
    </div>
</div>
<section class="duplicatable-content bkg">
	<h5>&nbsp;</h5>
	<h5>&nbsp;</h5>
	<h5>&nbsp;</h5>
	<h5>&nbsp;</h5>
</section>
