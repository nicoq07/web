<script type="text/javascript">
function ocultarOtros(nombre, nombreOtros)
{ 
    var estado = document.getElementById(nombre).checked;
    //alert(document.getElementById(nombre).checked);
    if (estado) {
        $("#"+nombreOtros).show();
    }
    else{
        $("#"+nombreOtros).hide();  
    }
}</script>


<section class="duplicatable-content bkg">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($reserva) ?>            
            <fieldset>
                <legend>Fecha del evento</legend>
                <div class="col-lg-6">
                <?php
                    //echo $this->Form->control('user_id', ['options' => $users, 'label' => 'Usuario']);
                    //echo $this->Form->control('estado_reserva_id', ['options' => $estadosReservas, 'label' => 'Estado']);
                    echo $this->Form->label('fecha_inicio', 'Inicio del evento');
                ?>
                <br>
                <?php
                    echo $this->Form->label('fecha_inicio', 'Fecha');
                    echo $this->Form->text('fecha_inicio', array('type' => 'date'));
                    echo $this->Form->label('fecha_inicio', 'Horario');
                    echo $this->Form->select('fecha_inicio', [
                        '09:00'=> '09:00',
                        '10:00'=> '10:00',
                        '11:00'=> '11:00',
                        '12:00'=> '12:00',
                        '13:00'=> '13:00',
                        '14:00'=> '14:00',
                        '15:00'=> '15:00',
                        '16:00'=> '16:00',
                        '17:00'=> '17:00',
                        '18:00'=> '18:00',
                        '19:00'=> '19:00',
                        '20:00'=> '20:00',
                        '21:00'=> '21:00',
                        '22:00'=> '22:00',
                        ]
                    );
                ?>
                </div>
                <div class="col-lg-6">
                <?php echo $this->Form->label('fecha_fin', 'Fin del evento'); ?>
                <br>
                <?php
                    echo $this->Form->label('fecha_fin', 'Fecha');
                    echo $this->Form->text('fecha_fin', array('type' => 'date'));
                    echo $this->Form->label('fecha_fin', 'Horario');
                    echo $this->Form->select('fecha_fin', [
                        '09:00'=> '09:00',
                        '10:00'=> '10:00',
                        '11:00'=> '11:00',
                        '12:00'=> '12:00',
                        '13:00'=> '13:00',
                        '14:00'=> '14:00',
                        '15:00'=> '15:00',
                        '16:00'=> '16:00',
                        '17:00'=> '17:00',
                        '18:00'=> '18:00',
                        '19:00'=> '19:00',
                        '20:00'=> '20:00',
                        '21:00'=> '21:00',
                        '22:00'=> '22:00',
                        ]
                    );
                    //echo $this->Form->control('fecha_fin', ['empty' => true]);
                    //echo $this->Form->control('active' , ['label' => 'Activo' ]);
                    //echo $this->Form->control('productos._ids', ['options' => $productos]);
                ?>
                </div>
            </fieldset>            
            <fieldset>
                <div>
                    <br>
                    <legend>Lugar del evento</legend>
                    <?php 
                        echo $this->Form->label('domicilio', 'Domicilio');
                        echo $this->Form->select('domicilio', [
                        'Brandsen 805, CABA',
                        'Ricardo Enrique Bochini 951, Avellaneda',
                        'Pasaje Mozart y Corbatta S/N, Avellaneda',
                        'Av. Pres. Figueroa Alcorta 7597, CABA',
                        ]
                    );
                    ?>
                    <?php echo $this->Form->input('otraDireccion', array('onclick'=>"ocultarOtros('otradireccion-1', 'cargarOtraDireccion')", 'label'=>false, 'type'=>'select', 'multiple'=>'checkbox', 'options'=>array(1=>'Otra dirección')));
                     ?>
                </div>
                <div id="cargarOtraDireccion" style="display: none">
                    <div class="col-lg-5">
                        <?php echo $this->Form->control('domicilio', ['label' => 'Calle']); ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $this->Form->control('domicilio', ['label' => 'Número']); ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $this->Form->control('domicilio', ['label' => 'Piso']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php 
                            echo $this->Form->label('domicilio', 'Localidad');
                            echo $this->Form->select('domicilio', [
                            'CABA',
                            'Lanús',
                            'Avellaneda',
                            'Lomas de Zamora',
                            ]
                        );
                        ?>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div>
                    <legend>Productos seleccionados</legend>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Cantidad</th>
                                <th>Descripción</th>
                                <th>Precio p/hora</th>
                                <th>Cantidad de horas</th>
                                <th>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>168</td>
                                <td>2</td>
                                <td>Inflable - Cubo</td>
                                <td>$100</td>
                                <td>5</td>
                                <td>$1000</td>
                            </tr>
                            <tr>
                                <td>238</td>
                                <td>1</td>
                                <td>Juegos - Metegol</td>
                                <td>$150</td>
                                <td>5</td>
                                <td>$750</td>
                            </tr>
                        </tbody>
                    </table>
                    <label class='pull-rigth'><strong>Costo de envío:</strong> $120</label>
                    <br>
                    <label><strong>Total a pagar:</strong> $1870</label>
                </div>           
            </fieldset>            
            <br>
            <?= $this->Form->button('Reservar') ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>

<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estados Reservas'), ['controller' => 'EstadosReservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estados Reserva'), ['controller' => 'EstadosReservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservas form large-9 medium-8 columns content">
    <?= $this->Form->create($reserva) ?>
    <fieldset>
        <legend><?= __('Add Reserva') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('estado_reserva_id', ['options' => $estadosReservas]);
            echo $this->Form->control('fecha_inicio', ['empty' => true]);
            echo $this->Form->control('fecha_fin', ['empty' => true]);
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
            echo $this->Form->control('productos._ids', ['options' => $productos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
