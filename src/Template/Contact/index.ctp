<h5>&nbsp;</h5>
<div class="row form-contact inputs-wrapper" >
	<div class="col-lg-6 col-lg-offset-3">
		<?php 
		echo $this->Form->create($contact);
		echo $this->Form->control('name',['label' => 'Nombre']);
		echo $this->Form->control('email',['label' => 'Correo']);
		echo $this->Form->control('body',['label' => 'Su mensaje', 'placeholder' => 'Escribí acá tu mensaje. Expresá todas tus inquietudes, entre más información nos proporciones, mejor.']);
		echo $this->Form->button('Enviar');
		echo $this->Form->end();
		?>
	</div>
</div>
<h5>&nbsp;</h5>
<h5>&nbsp;</h5>
<h5>&nbsp;</h5><h5>&nbsp;</h5>
