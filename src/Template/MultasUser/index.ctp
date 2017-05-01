<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <br>
    <h3 class="centrar">Multas</h3>
    <div class="pull-right"><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?></div>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active' , ['label' => 'Activo' ]) ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($multasUser as $multasUser): ?>
                <tr>
                    <td><?= $this->Number->format($multasUser->id) ?></td>
                    <td><?= $multasUser->has('user') ? $this->Html->link($multasUser->user->id, ['controller' => 'Users', 'action' => 'view', $multasUser->user->id]) : '' ?></td>
                    <td><?= h($multasUser->descripcion) ?></td>
                    <td><?= $this->Number->format($multasUser->precio) ?></td>
                    <td><?= h($multasUser->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $multasUser->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $multasUser->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $multasUser->id, 'class' => 'btn btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator centrar">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . 'Primera') ?>
            <?= $this->Paginator->prev('< ' . 'Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Siguiente' . ' >') ?>
            <?= $this->Paginator->last('Última' . ' >>') ?>
        </ul>
    </div>
</div>


<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Multas User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Multas'), ['controller' => 'PagosMultas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Multa'), ['controller' => 'PagosMultas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="multasUser index large-9 medium-8 columns content">
    <h3><?= __('Multas User') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($multasUser as $multasUser): ?>
            <tr>
                <td><?= $this->Number->format($multasUser->id) ?></td>
                <td><?= $multasUser->has('user') ? $this->Html->link($multasUser->user->id, ['controller' => 'Users', 'action' => 'view', $multasUser->user->id]) : '' ?></td>
                <td><?= h($multasUser->descripcion) ?></td>
                <td><?= $this->Number->format($multasUser->precio) ?></td>
                <td><?= h($multasUser->created) ?></td>
                <td><?= h($multasUser->modified) ?></td>
                <td><?= h($multasUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $multasUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $multasUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $multasUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multasUser->id)]) ?>
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
</div>-->