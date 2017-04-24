<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Domicilios'), ['controller' => 'Domicilios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Domicilio'), ['controller' => 'Domicilios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Telefonos'), ['controller' => 'Telefonos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Telefono'), ['controller' => 'Telefonos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personas index large-9 medium-8 columns content">
    <h3><?= __('Personas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?= $this->Number->format($persona->id) ?></td>
                <td><?= h($persona->dni) ?></td>
                <td><?= h($persona->nombre) ?></td>
                <td><?= h($persona->apellido) ?></td>
                <td><?= h($persona->created) ?></td>
                <td><?= h($persona->modified) ?></td>
                <td><?= h($persona->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $persona->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $persona->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?>
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
