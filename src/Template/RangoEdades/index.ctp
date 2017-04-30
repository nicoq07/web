<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <br>
    <h3 class="centrar">Rango de edades</h3>
    <div class="pull-right"><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?></div>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('rango') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rangoEdades as $rangoEdade): ?>
                <tr>
                    <td><?= $this->Number->format($rangoEdade->id) ?></td>
                    <td><?= h($rangoEdade->rango) ?></td>
                    <td><?= h($rangoEdade->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $rangoEdade->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $rangoEdade->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $rangoEdade->id, 'class' => 'btn btn-default']) ?>
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
        <li><?= $this->Html->link(__('New Rango Edade'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="rangoEdades index large-9 medium-8 columns content">
    <h3><?= __('Rango Edades') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rango') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rangoEdades as $rangoEdade): ?>
            <tr>
                <td><?= $this->Number->format($rangoEdade->id) ?></td>
                <td><?= h($rangoEdade->rango) ?></td>
                <td><?= h($rangoEdade->created) ?></td>
                <td><?= h($rangoEdade->modified) ?></td>
                <td><?= h($rangoEdade->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $rangoEdade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rangoEdade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rangoEdade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rangoEdade->id)]) ?>
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
