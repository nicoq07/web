<script type="text/javascript">

function validar(){
    var tarjetaId = document.getElementById("tarjeta_id").value;
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
        <div class="col-lg-6 col-lg-offset-3">
            <?= $this->Form->create($pagosMulta) ?>
            <fieldset>
            <legend>Nuevo pago</legend>
            <?php if (isset($current_user) && !empty($multasUser) && $current_user['id'] == $multasUser->user_id) { ?>
            <?php if ($multasUser->active == 1) { ?>
            <div class="col-lg-6">
                <?= $this->Form->input('multas_user_id', ['type' => 'text', 'value' => $multasUser->id, 'readonly' => 'readonly', 'label' => 'Código de multa']); ?>
            </div>
            <div class="col-lg-6">
                <?= $this->Form->input('monto', ['type' => 'text', 'value' => $multasUser->precio, 'readonly' => 'readonly']); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="col-lg-6">
                <?= $this->Form->control('medio_pago_id', ['options' => $mediosPagos]); ?>
            </div>
            <div class="col-lg-6">
                <?php 
                echo $this->Form->control('tarjeta_id', ['options' => $tarjetas, 'id' => 'tarjeta_id']);                        
                echo $this->Html->link('Otra Tarjeta', ['controller'=>'tarjetasCreditoUser', 'action' => 'add'], ['class' => 'btn btn-default']);
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <legend>Datos de la tarjeta</legend>
            <div class="bg-white" style='padding: 20px;'>
            <?php
                //echo $this->Form->input('Número de tarjeta', ['type'=>'number', 'placeholder'=>'Ingrese sólo los 16 números']);
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
        </div>
        <?php } else {
            echo "<div class='centrar'>Ésta multa ya se encuentra paga.</div>";
        } ?>
        <?php } else {
            echo "<div class='centrar'>Usted no tiene permisos para acceder a este pago.</div>";
        } ?>
            </fieldset>
    </div>
    <div class="col-lg-6 col-lg-offset-3">
        <br>
        <?= $this->Form->button('Realizar pago', ['class'=>'pull-right', 'onClick'=>"return validar();"]) ?>
        <?= $this->Form->end() ?> 
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
        <li><?= $this->Html->link(__('List Pagos Multas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Multas User'), ['controller' => 'MultasUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Multas User'), ['controller' => 'MultasUser', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['controller' => 'MediosPagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['controller' => 'MediosPagos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosMultas form large-9 medium-8 columns content">
    <?= $this->Form->create($pagosMulta) ?>
    <fieldset>
        <legend><?= __('Add Pagos Multa') ?></legend>
        <?php
            echo $this->Form->control('multas_user_id', ['options' => $multasUser]);
            echo $this->Form->control('medio_pago_id', ['options' => $mediosPagos]);
            echo $this->Form->control('monto');
            echo $this->Form->control('pagado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
