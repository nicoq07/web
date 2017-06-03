<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notacredito'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notacredito index large-9 medium-8 columns content">
    <h3><?= __('Notacredito') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('factura_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notacredito as $notacredito): ?>
            <tr>
                <td><?= $this->Number->format($notacredito->id) ?></td>
                <td><?= $notacredito->has('factura') ? $this->Html->link($notacredito->factura->id, ['controller' => 'Facturas', 'action' => 'view', $notacredito->factura->id]) : '' ?></td>
                <td><?= $this->Number->format($notacredito->monto) ?></td>
                <td><?= h($notacredito->created) ?></td>
                <td><?= h($notacredito->modified) ?></td>
                <td><?= h($notacredito->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notacredito->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notacredito->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notacredito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notacredito->id)]) ?>
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
