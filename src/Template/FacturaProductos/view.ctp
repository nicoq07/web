<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Factura Producto'), ['action' => 'edit', $facturaProducto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Factura Producto'), ['action' => 'delete', $facturaProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facturaProducto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Factura Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="facturaProductos view large-9 medium-8 columns content">
    <h3><?= h($facturaProducto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Producto') ?></th>
            <td><?= $facturaProducto->has('producto') ? $this->Html->link($facturaProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $facturaProducto->producto->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Factura') ?></th>
            <td><?= $facturaProducto->has('factura') ? $this->Html->link($facturaProducto->factura->id, ['controller' => 'Facturas', 'action' => 'view', $facturaProducto->factura->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($facturaProducto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($facturaProducto->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($facturaProducto->precio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($facturaProducto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($facturaProducto->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $facturaProducto->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
