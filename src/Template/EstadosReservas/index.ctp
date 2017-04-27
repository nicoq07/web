<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Estados Reserva'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estadosReservas index large-9 medium-8 columns content">
    <h3><?= __('Estados Reservas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estadosReservas as $estadosReserva): ?>
            <tr>
                <td><?= $this->Number->format($estadosReserva->id) ?></td>
                <td><?= h($estadosReserva->descripcion) ?></td>
                <td><?= h($estadosReserva->created) ?></td>
                <td><?= h($estadosReserva->modified) ?></td>
                <td><?= h($estadosReserva->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estadosReserva->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estadosReserva->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estadosReserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadosReserva->id)]) ?>
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
