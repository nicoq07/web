<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-6 col-lg-offset-3">
            <?= $this->Form->create($pagosEfectivo) ?>
            <fieldset>
                <legend>Nuevo pago</legend>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <?php
                        echo $this->Form->input('reserva_id', ['type'=>'text', 'label'=>'Número de reserva']);
                        //echo $this->Form->control('user_id', ['options' => $users]);
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <?php 
                            echo $this->Form->input('monto', ['type'=>'text', 'label'=>'Monto abonado']);
                         ?>
                    </div>
                </div>
                <br>
                <?= $this->Form->button('Realizar pago', ['class'=>'pull-right']) ?>
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
        <li><?= $this->Html->link(__('List Pagos Efectivo'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosEfectivo form large-9 medium-8 columns content">
    <?= $this->Form->create($pagosEfectivo) ?>
    <fieldset>
        <legend><?= __('Add Pagos Efectivo') ?></legend>
        <?php
            echo $this->Form->control('reserva_id', ['options' => $reservas]);
            echo $this->Form->control('recibo_id', ['options' => $recibos]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->