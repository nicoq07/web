<section class="duplicatable-content bkg">
	<div class="container">					
		<div class="row">				
			<div class="col-sm-8 col-sm-offset-2">
				<h5>&nbsp;</h5>
				<h3>Dudas y consultas</h3>
                <p>&nbsp; </p>
				<div class=" clearfix">
					<form class="form-contact email-form">
					  <div class="inputs-wrapper">
					<?= $this->Form->create() ?>
				    <fieldset>
				        <?
					        echo $this->Form->input('nombre', ['class' => 'form-nombre validate-required']); 
					     //   echo $this->Form->control('fecha', ['class' => 'form-fecha validate-required validate-fecha']); 
					        echo $this->Form->input('telefono', ['label' => 'Teléfono', 'class' => 'validate-required validate-tel']);
					        echo $this->Form->input('email', ['label' => 'Correo','class' => 'validate-required validate-email']);
					        echo $this->Form->input('localidad', ['class' => 'validate-required validate-localidad']);
						 echo $this->Form->textarea('mensaje', ['placeholder' => 'Escribí acá tu mensaje. Expresá todas tus inquietudes, entre más información nos proporciones, mejor.', 'class' => 'form-message validate-required']);?>
				    </fieldset>
				    <?= $this->Form->button('Enviar') ?>
				    <?= $this->Form->end() ?>
				    </div>
				  </form>
			  </div>
			</div>
		</div><!--end of row-->
        
        <div class="row">
        <div class="col-sm-12 text-center"> 
          <p>&nbsp;</p>
          <p>*Envie la mayor cantidad de información asi le podemos responder mejor su inquietud. <br>
      Desde ya muchas gracias.</p>
      </div></div>
	</div><!--end of container-->
</section>