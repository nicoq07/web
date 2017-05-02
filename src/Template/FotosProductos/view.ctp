<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fotos Producto'), ['action' => 'edit', $fotosProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fotos Producto'), ['action' => 'delete', $fotosProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fotos Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fotos Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fotosProductos view large-9 medium-8 columns content">
    <h3><?= h($fotosProducto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Producto') ?></th>
            <td><?= $fotosProducto->has('producto') ? $this->Html->link($fotosProducto->producto->descripcion, ['controller' => 'Productos', 'action' => 'view', $fotosProducto->producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Referencia') ?></th>
            <td><?= h($fotosProducto->referencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fotosProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($fotosProducto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($fotosProducto->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $fotosProducto->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
