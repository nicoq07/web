	<h5>&nbsp;</h5>
<div class="row">
	<div class="col-lg-6 col-lg-offset-3">	
	    <?= $this->Form->create($telefono) ?>
	    <fieldset>
	        <legend><?= __('Agregar teléfono') ?></legend>
	        <?php
	        if (!empty($current_user) && $current_user['rol_id'] != CLIENTE)
	        {
	            echo $this->Form->control('user_id');
	        }
	            echo $this->Form->control('tipo_telefono_id', ['options' => $tipoTelefonos]);
	            echo $this->Form->control('numero');
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__('Agregar')) ?>
	    <?= $this->Form->end() ?>
	 </div>
</div>
	<h5>&nbsp;</h5>
