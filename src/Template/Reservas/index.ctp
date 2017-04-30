<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <h3>Reservas</h3>
    <?= $this->Html->link('Nuevo', ['action' => 'add'], ['class' => 'btn btn-default']) ?>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('estado_reserva_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?= $this->Number->format($reserva->id) ?></td>
                    <td><?= $reserva->has('user') ? $this->Html->link($reserva->user->id, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
                    <td><?= $reserva->has('estados_reserva') ? $this->Html->link($reserva->estados_reserva->id, ['controller' => 'EstadosReservas', 'action' => 'view', $reserva->estados_reserva->id]) : '' ?></td>
                    <td><?= h($reserva->fecha_inicio) ?></td>
                    <td><?= h($reserva->fecha_fin) ?></td>
                    <td><?= h($reserva->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $reserva->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $reserva->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $reserva->id, 'class' => 'btn btn-default']) ?>
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


<!--<section class="duplicatable-content bkg">
    <div class="container ">
        <div class="row ">
            <div class="col-sm-8">              
                <div class="container">
                    <h1 class="azul text-center">Reservas</h1>
                    <div>
                        <label>Ordenar por:</label>
                        <select name="orden">
                            <option value="cliente">Cliente</option>
                            <option value="estado">Estado</option>
                            <option value="fecha">Fecha</option>
                            <option value="numero">Número</option>
                        </select>
                    </div>
                    <div>
                        <label>Filtrar por:</label>
                        <input type="text" placeholder="Mail del cliente">
                        <input type="button" value="Buscar">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Horario</th>
                                    <th>Domicilio</th>
                                    <th>Localidad</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>168</td>
                                    <td>usuario1@gmail.com</td>
                                    <td>29/04/2017</td>
                                    <td>14:00 - 18:00 hs.</td>
                                    <td>Av. Mitre 750</td>
                                    <td>Avellaneda</td>
                                    <td>Pagada</td>
                                    <td><input type="button" class="btn btn-primary" value="Detalles"><input type="button" class="btn btn-primary" value="Cancelar"></td>
                                </tr>
                                <tr>
                                    <td>169</td>
                                    <td>usuario2@gmail.com</td>
                                    <td>30/04/2017</td>
                                    <td>10:00 - 15:00 hs.</td>
                                    <td>Av. San Martín 1234</td>
                                    <td>Lanús Oeste</td>
                                    <td>Señada</td>
                                    <td><input type="button" class="btn btn-primary" value="Detalles"><input type="button" class="btn btn-primary" value="Cancelar"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>-->


<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estados Reservas'), ['controller' => 'EstadosReservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estados Reserva'), ['controller' => 'EstadosReservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservas index large-9 medium-8 columns content">
    <h3><?= __('Reservas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('estado_reserva_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?= $this->Number->format($reserva->id) ?></td>
                <td><?= $reserva->has('user') ? $this->Html->link($reserva->user->id, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
                <td><?= $reserva->has('estados_reserva') ? $this->Html->link($reserva->estados_reserva->id, ['controller' => 'EstadosReservas', 'action' => 'view', $reserva->estados_reserva->id]) : '' ?></td>
                <td><?= h($reserva->fecha_inicio) ?></td>
                <td><?= h($reserva->fecha_fin) ?></td>
                <td><?= h($reserva->created) ?></td>
                <td><?= h($reserva->modified) ?></td>
                <td><?= h($reserva->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $reserva->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reserva->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id)]) ?>
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
