<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reservas Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservasProductos index large-9 medium-8 columns content">
    <h3><?= __('Reservas Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('producto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservasProductos as $reservasProducto): ?>
            <tr>
                <td><?= $this->Number->format($reservasProducto->id) ?></td>
                <td><?= $reservasProducto->has('reserva') ? $this->Html->link($reservasProducto->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $reservasProducto->reserva->id]) : '' ?></td>
                <td><?= $reservasProducto->has('producto') ? $this->Html->link($reservasProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $reservasProducto->producto->id]) : '' ?></td>
                <td><?= $this->Number->format($reservasProducto->cantidad) ?></td>
                <td><?= h($reservasProducto->created) ?></td>
                <td><?= h($reservasProducto->modified) ?></td>
                <td><?= h($reservasProducto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reservasProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservasProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservasProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservasProducto->id)]) ?>
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
