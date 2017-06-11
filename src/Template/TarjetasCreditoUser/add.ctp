&nbsp;
<div class="row">
                	<div class = "col-lg-4 col-lg-offset-4">
					<h3> Agregar tarjeta</h3>
					&nbsp;
					
                    <?= $this->Form->create($tarjetasCreditoUser) ?>
                    <?php
                   
                    ?>
                            <?php
                            if (!$current_user['rol_id'] == CLIENTE || !$current_user['rol_id'] == BLOQUEADO)
                            {
                            	echo $this->Form->control('user_id', ['options' => $users]);
                            	
                            }
	                            echo $this->Form->control('marca', ['name' => 'marca', 'options' => $marca]);
	                            echo $this->Form->input('numero', ['label' => 'Número de tarjeta',  'placeholder'=>'Ingrese sólo los 16 números', 'maxlength' => '16']);
	                            echo $this->Form->label('Fecha de vencimiento');
                                echo $this->Form->input('vencimientoMes', ['type' => 'number', 'placeholder' => 'MM', 'label'=>false]);
                                echo $this->Form->input('vencimientoAnio', ['type' => 'number', 'placeholder' => 'AAAA', 'label'=>false]);
                                echo $this->Form->input('codSeguridad', ['label' => 'Código de seguridad' , 'type' => 'password', 'maxlength' => '3','placeholder'=>'XXX']);
                                echo $this->Form->input('active', ['label' => 'Activa']);
                                
                                ?>
                                                    <?= $this->Form->button('Guardar tarjeta') ?>
                                
                         </div>
                    <?php
                    ?>                         
                  
                    <br>
                        <?= $this->Form->end() ?>
</div>
&nbsp;