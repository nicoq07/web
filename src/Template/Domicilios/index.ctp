<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Domicilio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Localidades'), ['controller' => 'Localidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Localidade'), ['controller' => 'Localidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="domicilios index large-9 medium-8 columns content">
    <h3><?= __('Domicilios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('piso') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('localidad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($domicilios as $domicilio): ?>
            <tr>
                <td><?= $this->Number->format($domicilio->id) ?></td>
                <td><?= $this->Number->format($domicilio->user_id) ?></td>
                <td><?= h($domicilio->piso) ?></td>
                <td><?= h($domicilio->numero) ?></td>
                <td><?= h($domicilio->direccion) ?></td>
                <td><?= $domicilio->has('localidade') ? $this->Html->link($domicilio->localidade->id, ['controller' => 'Localidades', 'action' => 'view', $domicilio->localidade->id]) : '' ?></td>
                <td><?= h($domicilio->created) ?></td>
                <td><?= h($domicilio->modified) ?></td>
                <td><?= h($domicilio->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $domicilio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $domicilio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $domicilio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domicilio->id)]) ?>
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
