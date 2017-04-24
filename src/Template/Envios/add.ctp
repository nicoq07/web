<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Envios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Remitos'), ['controller' => 'Remitos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Remito'), ['controller' => 'Remitos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Domicilios'), ['controller' => 'Domicilios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Domicilio'), ['controller' => 'Domicilios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="envios form large-9 medium-8 columns content">
    <?= $this->Form->create($envio) ?>
    <fieldset>
        <legend><?= __('Add Envio') ?></legend>
        <?php
            echo $this->Form->control('remito_id', ['options' => $remitos]);
            echo $this->Form->control('reserva_id', ['options' => $reservas]);
            echo $this->Form->control('domicilio_id', ['options' => $domicilios]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
