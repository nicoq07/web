<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipo Telefono'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Telefonos'), ['controller' => 'Telefonos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Telefono'), ['controller' => 'Telefonos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoTelefonos index large-9 medium-8 columns content">
    <h3><?= __('Tipo Telefonos') ?></h3>
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
            <?php foreach ($tipoTelefonos as $tipoTelefono): ?>
            <tr>
                <td><?= $this->Number->format($tipoTelefono->id) ?></td>
                <td><?= h($tipoTelefono->descripcion) ?></td>
                <td><?= h($tipoTelefono->created) ?></td>
                <td><?= h($tipoTelefono->modified) ?></td>
                <td><?= h($tipoTelefono->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoTelefono->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoTelefono->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoTelefono->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoTelefono->id)]) ?>
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
