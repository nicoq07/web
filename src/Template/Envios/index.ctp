<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <h3>Envíos</h3>
    <?= $this->Html->link('Nuevo', ['action' => 'add'], ['class' => 'btn btn-default']) ?>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('remito_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('domicilio_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($envios as $envio): ?>
                <tr>
                    <td><?= $this->Number->format($envio->id) ?></td>
                <td><?= $envio->has('remito') ? $this->Html->link($envio->remito->id, ['controller' => 'Remitos', 'action' => 'view', $envio->remito->id]) : '' ?></td>
                <td><?= $envio->has('reserva') ? $this->Html->link($envio->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $envio->reserva->id]) : '' ?></td>
                <td><?= $envio->has('domicilio') ? $this->Html->link($envio->domicilio->id, ['controller' => 'Domicilios', 'action' => 'view', $envio->domicilio->id]) : '' ?></td>
                <td><?= h($envio->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $envio->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'delete', $envio->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $envio->id, 'class' => 'btn btn-default']) ?>
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
                    <h1 class="azul text-center">Envíos</h1>
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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>157</td>
                                    <td>usuario1@gmail.com</td>
                                    <td>29/04/2017</td>
                                    <td>14:00 - 18:00 hs.</td>
                                    <td>Av. Mitre 750</td>
                                    <td>Avellaneda</td>
                                    <td><input type="button" class="btn btn-primary" value="Ver detalles"></td>
                                </tr>
                                <tr>
                                    <td>158</td>
                                    <td>usuario2@gmail.com</td>
                                    <td>30/04/2017</td>
                                    <td>10:00 - 15:00 hs.</td>
                                    <td>Av. San Martín 1234</td>
                                    <td>Lanús Oeste</td>
                                    <td><input type="button" class="btn btn-primary" value="Ver detalles"></td>
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
        <li><?= $this->Html->link(__('New Envio'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Remitos'), ['controller' => 'Remitos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Remito'), ['controller' => 'Remitos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Domicilios'), ['controller' => 'Domicilios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Domicilio'), ['controller' => 'Domicilios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="envios index large-9 medium-8 columns content">
    <h3><?= __('Envios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('remito_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserva_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('domicilio_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($envios as $envio): ?>
            <tr>
                <td><?= $this->Number->format($envio->id) ?></td>
                <td><?= $envio->has('remito') ? $this->Html->link($envio->remito->id, ['controller' => 'Remitos', 'action' => 'view', $envio->remito->id]) : '' ?></td>
                <td><?= $envio->has('reserva') ? $this->Html->link($envio->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $envio->reserva->id]) : '' ?></td>
                <td><?= $envio->has('domicilio') ? $this->Html->link($envio->domicilio->id, ['controller' => 'Domicilios', 'action' => 'view', $envio->domicilio->id]) : '' ?></td>
                <td><?= h($envio->created) ?></td>
                <td><?= h($envio->modified) ?></td>
                <td><?= h($envio->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $envio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $envio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $envio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $envio->id)]) ?>
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
