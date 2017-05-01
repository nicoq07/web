<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reservas Producto'), ['action' => 'edit', $reservasProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reservas Producto'), ['action' => 'delete', $reservasProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservasProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservas Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reservas Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservasProductos view large-9 medium-8 columns content">
    <h3><?= h($reservasProducto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reserva') ?></th>
            <td><?= $reservasProducto->has('reserva') ? $this->Html->link($reservasProducto->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $reservasProducto->reserva->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Producto') ?></th>
            <td><?= $reservasProducto->has('producto') ? $this->Html->link($reservasProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $reservasProducto->producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reservasProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($reservasProducto->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reservasProducto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reservasProducto->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $reservasProducto->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
