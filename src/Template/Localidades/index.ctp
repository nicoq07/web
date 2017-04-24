<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Localidade'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="localidades index large-9 medium-8 columns content">
    <h3><?= __('Localidades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('provincia_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duracion_viaje') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($localidades as $localidade): ?>
            <tr>
                <td><?= $this->Number->format($localidade->id) ?></td>
                <td><?= $localidade->has('provincia') ? $this->Html->link($localidade->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $localidade->provincia->id]) : '' ?></td>
                <td><?= $this->Number->format($localidade->duracion_viaje) ?></td>
                <td><?= $this->Number->format($localidade->precio) ?></td>
                <td><?= h($localidade->descripcion) ?></td>
                <td><?= h($localidade->created) ?></td>
                <td><?= h($localidade->modified) ?></td>
                <td><?= h($localidade->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $localidade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $localidade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $localidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localidade->id)]) ?>
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
