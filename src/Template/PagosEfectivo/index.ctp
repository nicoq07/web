<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="container">
    <br>
    <h3 class="centrar">Pago efectivo</h3>
    <div class="pull-right"><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?></div>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('recibo_id') ?></th>
                    <th scope="col"><?= __('Pagado') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pagosEfectivo as $pagoEfectivo): ?>
                <tr>
                    <td><?= $this->Number->format($pagoEfectivo->id) ?></td>
                    <td><?= $this->Html->link($pagoEfectivo->reserva_id, ['controller' => 'Reservas', 'action' => 'view', $pagoEfectivo->reserva_id]) ?></td>
                    <td><?= $this->Html->link($pagoEfectivo->recibo_id, ['controller' => 'Recibos', 'action' => 'view', $pagoEfectivo->recibo_id]) ?></td>
                    <td>
                        <?php 
                        if ($pagoEfectivo->active == 1) {
                            echo "Si";
                        } else {
                            echo "No";
                        }
                        ?></td>
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

<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pagos Efectivo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosEfectivo index large-9 medium-8 columns content">
    <h3><?= __('Pagos Efectivo') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recibo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagosEfectivo as $pagosEfectivo): ?>
            <tr>
                <td><?= $this->Number->format($pagosEfectivo->id) ?></td>
                <td><?= $pagosEfectivo->has('reserva') ? $this->Html->link($pagosEfectivo->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $pagosEfectivo->reserva->id]) : '' ?></td>
                <td><?= $pagosEfectivo->has('recibo') ? $this->Html->link($pagosEfectivo->recibo->id, ['controller' => 'Recibos', 'action' => 'view', $pagosEfectivo->recibo->id]) : '' ?></td>
                <td><?= h($pagosEfectivo->created) ?></td>
                <td><?= h($pagosEfectivo->modified) ?></td>
                <td><?= h($pagosEfectivo->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagosEfectivo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagosEfectivo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagosEfectivo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosEfectivo->id)]) ?>
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