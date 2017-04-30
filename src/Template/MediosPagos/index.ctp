<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <h3>Medios de pago</h3>
    <?= $this->Html->link('Nuevo', ['action' => 'add'], ['class' => 'btn btn-default']) ?>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mediosPagos as $mediosPago): ?>
                <tr>
                    <td><?= $this->Number->format($mediosPago->id) ?></td>
                    <td><?= h($mediosPago->descripcion) ?></td>
                    <td><?= h($mediosPago->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $mediosPago->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $mediosPago->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $mediosPago->id, 'class' => 'btn btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
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
        <li><?= $this->Html->link(__('New Medios Pago'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mediosPagos index large-9 medium-8 columns content">
    <h3><?= __('Medios Pagos') ?></h3>
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
            <?php foreach ($mediosPagos as $mediosPago): ?>
            <tr>
                <td><?= $this->Number->format($mediosPago->id) ?></td>
                <td><?= h($mediosPago->descripcion) ?></td>
                <td><?= h($mediosPago->created) ?></td>
                <td><?= h($mediosPago->modified) ?></td>
                <td><?= h($mediosPago->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mediosPago->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mediosPago->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mediosPago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediosPago->id)]) ?>
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