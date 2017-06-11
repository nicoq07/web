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
	                            echo $this->Form->input('numero', ['label' => 'Número de tarjeta',  'placeholder'=>'Ingrese sólo los 16 números', 'max' => 9999999999999999, 'min' => 1111111111111111, 'type'=>'number']);
	                            echo $this->Form->label('Fecha de vencimiento');
                                echo $this->Form->input('vencimientoMes', ['type' => 'number', 'placeholder' => 'MM', 'min' => 1, 'max' => 12,'label'=>false]);
                                echo $this->Form->input('vencimientoAnio', ['type' => 'number', 'placeholder' => 'AAAA', 'max' => 2099, 'min' => 2017, 'label'=>false]);
                                echo $this->Form->input('codSeguridad', ['label' => 'Código de seguridad' , 'type' => 'number', 'max' => 999, 'min'=> 0, 'placeholder'=>'XXX']);
                                
                                ?>
                                                    <?= $this->Form->button('Guardar tarjeta') ?>
                                
                         </div>
                    <?php
                    ?>                         
                  
                    <br>
                        <?= $this->Form->end() ?>
</div>
&nbsp;