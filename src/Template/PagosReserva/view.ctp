<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagos Reserva'), ['action' => 'edit', $pagosReserva->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pagos Reserva'), ['action' => 'delete', $pagosReserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosReserva->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['controller' => 'MediosPagos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['controller' => 'MediosPagos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pagosReserva view large-9 medium-8 columns content">
    <h3><?= h($pagosReserva->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reserva') ?></th>
            <td><?= $pagosReserva->has('reserva') ? $this->Html->link($pagosReserva->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $pagosReserva->reserva->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $pagosReserva->has('user') ? $this->Html->link($pagosReserva->user->id, ['controller' => 'Users', 'action' => 'view', $pagosReserva->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medios Pago') ?></th>
            <td><?= $pagosReserva->has('medios_pago') ? $this->Html->link($pagosReserva->medios_pago->id, ['controller' => 'MediosPagos', 'action' => 'view', $pagosReserva->medios_pago->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pagosReserva->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pagosReserva->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pagosReserva->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pagado') ?></th>
            <td><?= $pagosReserva->pagado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
