<div class="row">
<h5>&nbsp;</h5>
    <div class="col-lg-6 col-lg-offset-3">
	    <?= $this->Form->create($domicilio) ?>
	    <fieldset>
	        <legend>Modificar domicilio</legend>
	        <?php
	            echo $this->Form->control('localidad_id', ['options' => $localidades]);
	            echo $this->Form->control('direccion');
	            echo $this->Form->control('numero');
	            echo $this->Form->control('piso');	            
	        ?>
	    </fieldset>
	    <?= $this->Form->button('Modificar') ?>
	    <?= $this->Form->end() ?>
<h5>&nbsp;</h5>
	   </div>
</div>
