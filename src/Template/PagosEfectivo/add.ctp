<?php
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
</div>
