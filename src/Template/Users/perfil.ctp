&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
		<div class="col-lg-6">
			<div class="well">
				<table class ="table table-striped table-hover"  cellpadding="0" cellspacing="0">
					<tr>
			            <th scope="row"><?= __('Nombre y Apellido') ?></th>
			            <td><?= h($user->nombre) . " " .h($user->apellido) ?></td>
			        </tr>
			        <tr>
			            <th scope="row"><?= __('DNI') ?></th>
			            <td><?= h($user->dni) ?></td>
			        </tr>
			        
			        <tr>
			            <th scope="row"><?= __('Correo electronico') ?></th>
			            <td><?= h($user->email) ?></td>
			        </tr>
			        <tr>
			            <th scope="row"><?= __('Fecha alta en sistema') ?></th>
			            <td><?= h($user->created->format('d/m/Y'))?></td>
			        </tr>
			        <tr>
			            <th scope="row"><?= __('Activo') ?></th>
			            <td><?= $user->active ? __('Si') : __('No'); ?></td>
			        </tr>
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
