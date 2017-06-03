<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagos Efectivo'), ['action' => 'edit', $pagosEfectivo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pagos Efectivo'), ['action' => 'delete', $pagosEfectivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosEfectivo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Efectivo'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Efectivo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pagosEfectivo view large-9 medium-8 columns content">
    <h3><?= h($pagosEfectivo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reserva') ?></th>
            <td><?= $pagosEfectivo->has('reserva') ? $this->Html->link($pagosEfectivo->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $pagosEfectivo->reserva->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recibo') ?></th>
            <td><?= $pagosEfectivo->has('recibo') ? $this->Html->link($pagosEfectivo->recibo->id, ['controller' => 'Recibos', 'action' => 'view', $pagosEfectivo->recibo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pagosEfectivo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pagosEfectivo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pagosEfectivo->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $pagosEfectivo->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
