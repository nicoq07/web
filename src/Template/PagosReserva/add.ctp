<script type="text/javascript">

function validar(){
    var tarjetaId = document.getElementById("tarjeta-id").value;
    var medioPagoId = document.getElementById("medio-pago-id").value;
    var monto = document.getElementById("monto").value;
    
    if (monto == "") {
        alert("Debe seleccionar un monto a pagar para continuar.")
        return false;
    }
    if (medioPagoId == "") {
        alert("Debe seleccionar un medio de pago para continuar.");
        return false;
    }
    if (tarjetaId == 0) {
        alert("Debe seleccionar una tarjeta para continuar.")
        return false;
    }
    return true;
}

</script>

<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($pagosReserva) ?>
            <fieldset>
                <legend>Nuevo pago</legend>
                <?php if (isset($current_user) && !empty($reserva) && $current_user['id'] == $reserva->user_id) { ?>
                <?php
                if (isset($factura) && $factura->porcentajePago < 1) { ?>
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                        echo $this->Form->input('reserva_id', ['type'=>'text', 'value'=>$reserva->id, 'readonly'=>'readonly']);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <?php 
                            switch ($factura->porcentajePago) {
                                case '0':
                                    echo $this->Form->control('monto', ['options' => array(
                                    number_format(0.5, 2, '.', '') =>'%50 - $'.$reserva->total*.5,
                                    number_format(0.75, 2, '.', '') =>'%75 - $'.$reserva->total*.75,
                                    number_format(1, 2, '.', '')=>'%100 - $'.$reserva->total), 'empty' => 'Seleccione % a pagar']);
                                    break;
                                case '0.5':
                                    echo $this->Form->control('monto', ['options' => array(
                                    number_format(0.5, 2, '.', '') =>'%50 - $'.$reserva->total*.5)]);
                                    break;
                                case '0.75':
                                    echo $this->Form->control('monto', ['options' => array(
                                    number_format(0.25, 2, '.', '') =>'%25 - $'.$reserva->total*.25)]);
                                    break;
                            }
                         ?>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->Form->control('medio_pago_id', ['options' => $mediosPagos, 'empty' => 'Elija un medio de pago']); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php
                        $cont = 0;
                        foreach ($tarjetas as $tarjeta) {
                            $cont ++;
                        }
                         
                        if ($cont == 0) {
                            echo $this->Form->control('tarjeta_id', ['options' => [0 => 'Debe cargar una tarjeta']]);
                        } else {
                            echo $this->Form->control('tarjeta_id', ['options' => $tarjetas]);
                        }                      
                        echo $this->Html->link('Otra Tarjeta', ['controller'=>'tarjetasCreditoUser', 'action' => 'add', $current_user['id']], ['class' => 'btn btn-default']);
                        ?>
                    </div>
                </div>
                <br>
                <div class="col-lg-8 col-lg-offset-2">
                <legend>Datos de la tarjeta</legend>
                    <div class="bg-white" style='padding: 20px;'>
                    <?php
                        echo $this->Form->label('Fecha de vencimiento');
                    ?>
                        <div class="row">
                            <div class="col-lg-6">
                            <?php
                                echo $this->Form->input('vencimientoMes', ['type'=>'number', 'placeholder'=>'MM', 'label'=>false, 'max'=>12, 'min'=>1]);
                            ?>
                            </div>
                            <div class="col-lg-6">
                            <?php
                                echo $this->Form->input('vencimientoAnio', ['type'=>'number', 'placeholder'=>'AAAA', 'label'=>false, 'max'=>2099, 'min'=>2017]);
                            ?>
                            </div>
                        </div>
                    <?php
                        echo $this->Form->input('codSeguridad', ['type'=>'number', 'placeholder'=>'XXX', 'max'=>999, 'min'=>0]);
                    ?>                        
                    </div>
                    <br>
                    <?= $this->Form->button('Realizar pago', ['class'=>'pull-right', 'onClick'=>"return validar();"]) ?>
                </div>
            <?php } else {
                echo "<div class='centrar'>Ésta reserva ya se encuentra paga.</div>";
            } ?>
            <?php } else {
                echo "<div class='centrar'>Usted no tiene permisos para acceder a este pago.</div>";
            } ?>
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
