<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pagosReserva->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pagosReserva->id)]
            )
        ?></li>
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
        <legend><?= __('Edit Pagos Reserva') ?></legend>
        <?php
            echo $this->Form->control('reserva_id', ['options' => $reservas]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('medio_pago_id', ['options' => $mediosPagos]);
            echo $this->Form->control('pagado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
