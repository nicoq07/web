<div class="row">	
	<div class="col-lg-5">
	    <?= $this->Form->create($telefono) ?>
	    <fieldset>
	        <legend><?= __('Edit Telefono') ?></legend>
	        <?php
	            echo $this->Form->control('user_id');
	            echo $this->Form->control('tipo_telefono_id', ['options' => $tipoTelefonos]);
	            echo $this->Form->control('numero');
	            echo $this->Form->control('active');
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__('Submit')) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>