<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($pagosReserva) ?>
            <fieldset>
                <legend>Nuevo pago</legend>
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                        echo $this->Form->input('reserva_id', ['type'=>'text', 'value'=>$reserva->id, 'readonly'=>'readonly']);
                        //echo $this->Form->control('user_id', ['options' => $users]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->control('Porcentaje a pagar', ['options' => array(
                        number_format($reserva->total*.5, 2) =>'%50 - $'.$reserva->total*.5,
                        number_format($reserva->total*.75, 2) =>'%75 - $'.$reserva->total*.75,
                        number_format($reserva->total, 2)=>'%100 - $'.$reserva->total), 'empty' => 'Seleccione % a pagar']); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->Form->control('monto', ['options' => $mediosPagos, 'empty' => 'Elija un medio de pago']); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php /*echo $this->Form->control('Tarjeta', ['options' => array(
                        'VISA', 
                        'MASTERCARD', 
                        'AMERICAN EXPRESS'
                        ), 'empty' => 'Elija su tarjeta...']);*/

                        echo $this->Form->control('tarjeta_id', ['options' => $tarjetas]);                        
                        echo $this->Html->link('Otra Tarjeta', ['controller'=>'tarjetasCreditoUser', 'action' => 'add'], ['class' => 'btn btn-default']);
                        ?>
                    </div>
                </div>
                <br>
                <div class="col-lg-8 col-lg-offset-2">
                <legend>Datos de la tarjeta</legend>
                    <div class="bg-white" style='padding: 20px;'>
                    <?php
                        //echo $this->Form->input('Número de tarjeta', ['type'=>'number', 'placeholder'=>'Ingrese sólo los 16 números']);
                        echo $this->Form->label('Fecha de vencimiento');
                    ?>
                        <div class="row">
                            <div class="col-lg-6">
                            <?php
                                echo $this->Form->input('vencimientoMes', ['type'=>'number', 'placeholder'=>'MM', 'label'=>false]);
                            ?>
                            </div>
                            <div class="col-lg-6">
                            <?php
                                echo $this->Form->input('vencimientoAnio', ['type'=>'number', 'placeholder'=>'AAAA', 'label'=>false]);
                            ?>
                            </div>
                        </div>
                    <?php
                        echo $this->Form->input('codSeguridad', ['type'=>'number', 'placeholder'=>'XXX']);
                    ?>                        
                    </div>
                    <br>
                    <?= $this->Form->button('Realizar pago', ['class'=>'pull-right']) ?>
                </div>
            </fieldset>            
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
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['controller' => 'MediosPagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['controller' => 'MediosPagos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosReserva form large-9 medium-8 columns content">
    <?= $this->Form->create($pagosReserva) ?>
    <fieldset>
        <legend><?= __('Add Pagos Reserva') ?></legend>
        <?php
            echo $this->Form->control('reserva_id', ['options' => $reservas]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('medio_pago_id', ['options' => $mediosPagos]);
            echo $this->Form->control('pagado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
