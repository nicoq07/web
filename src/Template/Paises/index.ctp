<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Paise'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paises index large-9 medium-8 columns content">
    <h3><?= __('Paises') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('abreviatura') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paises as $paise): ?>
            <tr>
                <td><?= $this->Number->format($paise->id) ?></td>
                <td><?= h($paise->abreviatura) ?></td>
                <td><?= h($paise->descripcion) ?></td>
                <td><?= h($paise->created) ?></td>
                <td><?= h($paise->modified) ?></td>
                <td><?= h($paise->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $paise->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paise->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paise->id)]) ?>
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
