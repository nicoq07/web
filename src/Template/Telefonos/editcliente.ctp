<div class="row">
<h5>&nbsp;</h5>
	<div class="col-lg-6 col-lg-offset-3">
	    <?= $this->Form->create($telefono) ?>
	    <fieldset>
	        <h3><?= __('Editar mi teléfono') ?></h3>
	        <?php
	        	echo $this->Form->control('tipo_telefono_id', ['options' => $tipoTelefonos ,  'label' => 'Tipo']);
	            echo $this->Form->control('numero',  [ 'label' => 'Número']);
	            echo $this->Form->control('active',  [ 'label' => 'Activo']);
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__('Guardar')) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
<section class="duplicatable-content bkg">
	<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
</section>