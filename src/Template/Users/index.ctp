<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <br>
    <h3 class="centrar">Usuarios</h3>
    <div class="pull-right"><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?></div>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('rol_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->dni) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellido) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td><?= h($user->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $user->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Html->link('Multar', [ 'controller' => 'multasUser', 'action' => 'add', $user->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $user->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $user->id, 'class' => 'btn btn-default']) ?>
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
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calificaciones Productos'), ['controller' => 'CalificacionesProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calificaciones Producto'), ['controller' => 'CalificacionesProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Domicilios'), ['controller' => 'Domicilios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Domicilio'), ['controller' => 'Domicilios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Multas User'), ['controller' => 'MultasUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Multas User'), ['controller' => 'MultasUser', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Telefonos'), ['controller' => 'Telefonos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Telefono'), ['controller' => 'Telefonos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rol_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->dni) ?></td>
                <td><?= h($user->nombre) ?></td>
                <td><?= h($user->apellido) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td><?= h($user->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
