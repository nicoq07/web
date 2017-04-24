<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones Productos'), ['controller' => 'CalificacionesProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificaciones Producto'), ['controller' => 'CalificacionesProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Multas User'), ['controller' => 'MultasUser', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Multas User'), ['controller' => 'MultasUser', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Persona') ?></th>
            <td><?= $user->has('persona') ? $this->Html->link($user->persona->id, ['controller' => 'Personas', 'action' => 'view', $user->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->id, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $user->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Calificaciones Productos') ?></h4>
        <?php if (!empty($user->calificaciones_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col"><?= __('Calificacion') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->calificaciones_productos as $calificacionesProductos): ?>
            <tr>
                <td><?= h($calificacionesProductos->id) ?></td>
                <td><?= h($calificacionesProductos->user_id) ?></td>
                <td><?= h($calificacionesProductos->producto_id) ?></td>
                <td><?= h($calificacionesProductos->calificacion) ?></td>
                <td><?= h($calificacionesProductos->created) ?></td>
                <td><?= h($calificacionesProductos->modified) ?></td>
                <td><?= h($calificacionesProductos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CalificacionesProductos', 'action' => 'view', $calificacionesProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CalificacionesProductos', 'action' => 'edit', $calificacionesProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CalificacionesProductos', 'action' => 'delete', $calificacionesProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calificacionesProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Multas User') ?></h4>
        <?php if (!empty($user->multas_user)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->multas_user as $multasUser): ?>
            <tr>
                <td><?= h($multasUser->id) ?></td>
                <td><?= h($multasUser->user_id) ?></td>
                <td><?= h($multasUser->descripcion) ?></td>
                <td><?= h($multasUser->precio) ?></td>
                <td><?= h($multasUser->created) ?></td>
                <td><?= h($multasUser->modified) ?></td>
                <td><?= h($multasUser->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MultasUser', 'action' => 'view', $multasUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MultasUser', 'action' => 'edit', $multasUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MultasUser', 'action' => 'delete', $multasUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multasUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pagos Reserva') ?></h4>
        <?php if (!empty($user->pagos_reserva)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Reserva Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Medio Pago Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->pagos_reserva as $pagosReserva): ?>
            <tr>
                <td><?= h($pagosReserva->id) ?></td>
                <td><?= h($pagosReserva->reserva_id) ?></td>
                <td><?= h($pagosReserva->user_id) ?></td>
                <td><?= h($pagosReserva->medio_pago_id) ?></td>
                <td><?= h($pagosReserva->created) ?></td>
                <td><?= h($pagosReserva->modified) ?></td>
                <td><?= h($pagosReserva->pagado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PagosReserva', 'action' => 'view', $pagosReserva->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PagosReserva', 'action' => 'edit', $pagosReserva->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PagosReserva', 'action' => 'delete', $pagosReserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosReserva->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reservas') ?></h4>
        <?php if (!empty($user->reservas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Estado Reserva Id') ?></th>
                <th scope="col"><?= __('Fecha Inicio') ?></th>
                <th scope="col"><?= __('Fecha Fin') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reservas as $reservas): ?>
            <tr>
                <td><?= h($reservas->id) ?></td>
                <td><?= h($reservas->user_id) ?></td>
                <td><?= h($reservas->estado_reserva_id) ?></td>
                <td><?= h($reservas->fecha_inicio) ?></td>
                <td><?= h($reservas->fecha_fin) ?></td>
                <td><?= h($reservas->created) ?></td>
                <td><?= h($reservas->modified) ?></td>
                <td><?= h($reservas->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservas', 'action' => 'view', $reservas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservas', 'action' => 'edit', $reservas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservas', 'action' => 'delete', $reservas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
