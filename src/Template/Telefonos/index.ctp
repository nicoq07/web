<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Telefono'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Telefonos'), ['controller' => 'TipoTelefonos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Telefono'), ['controller' => 'TipoTelefonos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="telefonos index large-9 medium-8 columns content">
    <h3><?= __('Telefonos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo_telefono_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($telefonos as $telefono): ?>
            <tr>
                <td><?= $this->Number->format($telefono->id) ?></td>
                <td><?= $this->Number->format($telefono->user_id) ?></td>
                <td><?= $telefono->has('tipo_telefono') ? $this->Html->link($telefono->tipo_telefono->id, ['controller' => 'TipoTelefonos', 'action' => 'view', $telefono->tipo_telefono->id]) : '' ?></td>
                <td><?= h($telefono->numero) ?></td>
                <td><?= h($telefono->created) ?></td>
                <td><?= h($telefono->modified) ?></td>
                <td><?= h($telefono->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $telefono->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $telefono->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $telefono->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telefono->id)]) ?>
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
