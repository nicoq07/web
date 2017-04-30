<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <br>
    <h3 class="centrar">Pago de reservas</h3>
    <div class="pull-right"><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?></div>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('medio_pago_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('pagado') ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pagosReserva as $pagosReserva): ?>
                <tr>
                    <td><?= $this->Number->format($pagosReserva->id) ?></td>
                    <td><?= $pagosReserva->has('reserva') ? $this->Html->link($pagosReserva->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $pagosReserva->reserva->id]) : '' ?></td>
                    <td><?= $pagosReserva->has('user') ? $this->Html->link($pagosReserva->user->id, ['controller' => 'Users', 'action' => 'view', $pagosReserva->user->id]) : '' ?></td>
                    <td><?= $pagosReserva->has('medios_pago') ? $this->Html->link($pagosReserva->medios_pago->id, ['controller' => 'MediosPagos', 'action' => 'view', $pagosReserva->medios_pago->id]) : '' ?></td>
                    <td><?= h($pagosReserva->pagado) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $pagosReserva->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $pagosReserva->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $pagosReserva->id, 'class' => 'btn btn-default']) ?>
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
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['controller' => 'MediosPagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['controller' => 'MediosPagos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosReserva index large-9 medium-8 columns content">
    <h3><?= __('Pagos Reserva') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medio_pago_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pagado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagosReserva as $pagosReserva): ?>
            <tr>
                <td><?= $this->Number->format($pagosReserva->id) ?></td>
                <td><?= $pagosReserva->has('reserva') ? $this->Html->link($pagosReserva->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $pagosReserva->reserva->id]) : '' ?></td>
                <td><?= $pagosReserva->has('user') ? $this->Html->link($pagosReserva->user->id, ['controller' => 'Users', 'action' => 'view', $pagosReserva->user->id]) : '' ?></td>
                <td><?= $pagosReserva->has('medios_pago') ? $this->Html->link($pagosReserva->medios_pago->id, ['controller' => 'MediosPagos', 'action' => 'view', $pagosReserva->medios_pago->id]) : '' ?></td>
                <td><?= h($pagosReserva->created) ?></td>
                <td><?= h($pagosReserva->modified) ?></td>
                <td><?= h($pagosReserva->pagado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagosReserva->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagosReserva->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagosReserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosReserva->id)]) ?>
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