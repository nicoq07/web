<div class="row">	
<h5>&nbsp;</h5>
	<div class="col-lg-6 col-lg-offset-3">
	    <?= $this->Form->create($telefono) ?>
	    <fieldset>
	        <legend><?= __('Editar teléfono') ?></legend>
	        <?php
	        	echo $this->Form->control('user_id', ['options' => $users]);
	            echo $this->Form->control('tipo_telefono_id', ['options' => $tipoTelefonos]);
	            echo $this->Form->control('numero');
	            echo $this->Form->control('active',['label' => 'Activo']);
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__('Guardar')) ?>
	    <?= $this->Form->end() ?>
	    <h5>&nbsp;</h5>
	</div>
</div>
<section class="duplicatable-content bkg">
	<h5>&nbsp;</h5>
</section>