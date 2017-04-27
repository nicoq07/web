<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Envio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Remitos'), ['controller' => 'Remitos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Remito'), ['controller' => 'Remitos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Domicilios'), ['controller' => 'Domicilios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Domicilio'), ['controller' => 'Domicilios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="envios index large-9 medium-8 columns content">
    <h3><?= __('Envios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remito_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('domicilio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($envios as $envio): ?>
            <tr>
                <td><?= $this->Number->format($envio->id) ?></td>
                <td><?= $envio->has('remito') ? $this->Html->link($envio->remito->id, ['controller' => 'Remitos', 'action' => 'view', $envio->remito->id]) : '' ?></td>
                <td><?= $envio->has('reserva') ? $this->Html->link($envio->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $envio->reserva->id]) : '' ?></td>
                <td><?= $envio->has('domicilio') ? $this->Html->link($envio->domicilio->id, ['controller' => 'Domicilios', 'action' => 'view', $envio->domicilio->id]) : '' ?></td>
                <td><?= h($envio->created) ?></td>
                <td><?= h($envio->modified) ?></td>
                <td><?= h($envio->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $envio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $envio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $envio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $envio->id)]) ?>
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
