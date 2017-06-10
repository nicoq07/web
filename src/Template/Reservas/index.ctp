<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <br>
    <h3 class="centrar">Reservas</h3>
    <?php echo $this->Form->create($reservas, ['id' => 'miform']); ?>
    <div class="row">
        <div class="col-lg-3">
            <?php 
            echo $this->Form->label('Filtrar por Fecha:');
            echo $this->Form->text('fecha', ['label'=>'Filtrar por fecha:', 'type' => 'date','onchange'=>'document.getElementById("miform").submit()']);?>
        </div>
        <div class="col-lg-3">
            <?php
            echo $this->Form->label('Filtrar por estado:');
            echo $this->Form->control('estado_reserva_id', ['options' => $estados, 'label' => false, 'empty' => 'Todos','onchange'=>'document.getElementById("miform").submit()']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->control('idlistuser', ['label'=>'Filtrar por cliente:', 'list'=>'user', 'onchange'=>'document.getElementById("miform").submit()']);?>
        </div>
        <datalist id="user">
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id']; ?>" label="<?php echo $user['nombre']." ".$user['apellido']." - ".$user['email']; ?>">
            <?php endforeach; ?>
        </datalist>
        <!--div class="col-lg-2">
            <button class="btn btn-default">Buscar</button>
        </div-->
        <div class="col-lg-1">
       		<?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>



    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('estado_reserva_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha_inicio') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('fecha_fin') ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?>
                <tr>
                    <td><?= $this->Number->format($reserva->id) ?></td>
                    <td><?= $reserva->has('user') ? $this->Html->link($reserva->user->id, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
                    <td><?= $reserva->has('estados_reserva') ? h($reserva->estados_reserva->descripcion) : '' ?></td>
                    <td><?= h($reserva->fecha_inicio->format("d/m/y, h:i A")) ?></td>
                    <td><?= h($reserva->fecha_fin->format("d/m/y, h:i A")) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Detalles', ['action' => 'view', $reserva->id], ['class' => 'btn btn-default']) ?>
                        <?php 
                            if ($reserva->estado_reserva_id != 4 && $reserva->estado_reserva_id != 5) {
                                echo $this->Form->postLink('Cancelar', ['action' => 'cancelar', $reserva->id], ['confirm' => '¿Está seguro que desea cancelar la reserva?', $reserva->id, 'class' => 'btn btn-default']);
                            } ?>
                        <?php 
                            if ($reserva->estado_reserva_id == 1 || $reserva->estado_reserva_id == 2) {
                                echo $this->Html->link('Pagar', ['controller' => 'PagosReserva', 'action' => 'add', $reserva->id], ['class' => 'btn btn-default']);
                            }
                         ?>
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
                <th scope="col"><?= $this->Paginator->sort('active' , ['label' => 'Activo' ]) ?></th>
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
