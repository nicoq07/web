<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Factura Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="facturaProductos index large-9 medium-8 columns content">
    <h3><?= __('Factura Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('producto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('factura_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturaProductos as $facturaProducto): ?>
            <tr>
                <td><?= $this->Number->format($facturaProducto->id) ?></td>
                <td><?= $facturaProducto->has('producto') ? $this->Html->link($facturaProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $facturaProducto->producto->id]) : '' ?></td>
                <td><?= $facturaProducto->has('factura') ? $this->Html->link($facturaProducto->factura->id, ['controller' => 'Facturas', 'action' => 'view', $facturaProducto->factura->id]) : '' ?></td>
                <td><?= $this->Number->format($facturaProducto->cantidad) ?></td>
                <td><?= $this->Number->format($facturaProducto->precio) ?></td>
                <td><?= h($facturaProducto->created) ?></td>
                <td><?= h($facturaProducto->modified) ?></td>
                <td><?= h($facturaProducto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $facturaProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $facturaProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $facturaProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facturaProducto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
