	<h5>&nbsp;</h5>
<div class="container">
	
    <?= $this->Form->create($domicilio) ?>
    <fieldset>
        <legend><?= __('Agregar domicilio') ?></legend>
        <?php
       		echo $this->Form->control('localidad_id', ['options' => $localidades]);
       		echo $this->Form->control('direccion');
       		if (!empty($current_user) && $current_user['rol_id'] != CLIENTE)
       		{
       			echo $this->Form->control('user_id', ['options' => $users]);
       			
       		}
            echo $this->Form->control('piso');
            echo $this->Form->control('numero');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Agregar')) ?>
    <?= $this->Form->end() ?>
</div>
	<h5>&nbsp;</h5>