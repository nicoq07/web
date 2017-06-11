<?php
use PhpParser\Parser\Php5;
?>

<section class="duplicatable-content bkg">
	<div class="row">	
		<div class="col-lg-8 col-lg-offset-2">
		    <?= $this->Form->create($user) ?>
		    <fieldset>
		        <legend><?= __('Registro') ?></legend>		        
		        <?php
			        echo $this->Form->control('nombre');
			        echo $this->Form->control('apellido');
		            echo $this->Form->control('dni', ['type'=>'number']);
		            echo $this->Form->control('email', ['type'=>'email']);
		            echo $this->Form->control('password', ['maxlength'=>8,'minlength'=>4]);
		            echo "<small>* El password debe tener entre 4 y 8 caracteres.</small>";

		            if (!empty($current_user))
		            {	
	 		            echo $this->Form->control('rol_id', ['options' => $roles, 'empty' => true]);
			            echo $this->Form->control('active',['label' => 'Activo']);
		            }
		        ?>
		    </fieldset>
		     <?php 
		     if (!empty($current_user))
		     {
		     	$title = "Registrar";
		     }
		     else 
		     {
		     	$title = "Registrarme";
		     }
		     ?>
		     <br>
		    <?= $this->Form->button($title) ?>
		    <?= $this->Form->end() ?>
		   </div>
	  </div>
</section>
