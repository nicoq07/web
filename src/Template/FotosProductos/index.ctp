<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fotos Producto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fotosProductos index large-9 medium-8 columns content">
    <h3><?= __('Fotos Productos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('producto_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fotosProductos as $fotosProducto): ?>
            <tr>
                <td><?= $this->Number->format($fotosProducto->id) ?></td>
                <td><?= $fotosProducto->has('producto') ? $this->Html->link($fotosProducto->producto->id, ['controller' => 'Productos', 'action' => 'view', $fotosProducto->producto->id]) : '' ?></td>
                <td><?= h($fotosProducto->file) ?></td>
                <td><?= h($fotosProducto->created) ?></td>
                <td><?= h($fotosProducto->modified) ?></td>
                <td><?= h($fotosProducto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fotosProducto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fotosProducto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fotosProducto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosProducto->id)]) ?>
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
