<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calificaciones Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calificacionesProductos index large-9 medium-8 columns content">
    <h3><?= __('Calificaciones Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('producto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('calificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calificacionesProductos as $calificacionesProducto): ?>
            <tr>
                <td><?= $this->Number->format($calificacionesProducto->id) ?></td>
                <td><?= $calificacionesProducto->has('user') ? $this->Html->link($calificacionesProducto->user->id, ['controller' => 'Users', 'action' => 'view', $calificacionesProducto->user->id]) : '' ?></td>
                <td><?= $calificacionesProducto->has('producto') ? $this->Html->link($calificacionesProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $calificacionesProducto->producto->id]) : '' ?></td>
                <td><?= $this->Number->format($calificacionesProducto->calificacion) ?></td>
                <td><?= h($calificacionesProducto->created) ?></td>
                <td><?= h($calificacionesProducto->modified) ?></td>
                <td><?= h($calificacionesProducto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $calificacionesProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calificacionesProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calificacionesProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calificacionesProducto->id)]) ?>
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
