<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calificaciones Producto'), ['action' => 'edit', $calificacionesProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calificaciones Producto'), ['action' => 'delete', $calificacionesProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calificacionesProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificaciones Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calificacionesProductos view large-9 medium-8 columns content">
    <h3><?= h($calificacionesProducto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $calificacionesProducto->has('user') ? $this->Html->link($calificacionesProducto->user->id, ['controller' => 'Users', 'action' => 'view', $calificacionesProducto->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Producto') ?></th>
            <td><?= $calificacionesProducto->has('producto') ? $this->Html->link($calificacionesProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $calificacionesProducto->producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($calificacionesProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Calificacion') ?></th>
            <td><?= $this->Number->format($calificacionesProducto->calificacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($calificacionesProducto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($calificacionesProducto->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $calificacionesProducto->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
