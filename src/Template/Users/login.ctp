<section class="duplicatable-content bkg">
	<div class="container">					
		<div class="row">				
			<div class="col-lg-8 col-lg-offset-2">
				<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<?= $this->Form->create() ?>
				<h3><?php echo h('Iniciar sesión')?></h3>
                <p>&nbsp; </p>
<!-- 				<div class="form-wrapper clearfix"> -->
<!-- 						<div class="inputs-wrapper"> -->
						<?= $this->Form->input('email',['class' => 'form validate-required', 'placeholder' => 'Dirección de mail',
                         'label' => false , 'require'])?>
                           <?= $this->Form->input('password',['class' => 'form validate-required validate-email', 'placeholder' => 'Constraseña',
                         'label' => false , 'require'])?>
<!-- 							<input class="form validate-required" type="text" placeholder="Usuario" name="usuario"> 
							<input class="form validate-required validate-email" type="text" placeholder="<?= h('Contraseña')?>" name="contrasena">-->
<!--                         </div> -->
                        <?= $this->Html->link('No estás registrado?',['action' => 'add'])?>
                        <br>
                        <br>
                          <?= $this->Form->button(__('Acceder'),['class' => 'send-form'])?>
<!-- 						<input type="submit" class="send-form" value="Enviar"> -->
						
				<?= $this->Form->end()?>
					 
					   
					     
					   
<!-- 			  </div> -->
			</div>
		</div><!--end of row-->
	</div><!--end of container-->
</section>