<section class="duplicatable-content bkg">
    <div class="col-lg-8 col-lg-offset-2">                        
        <div>
            <legend>Detalle del remito</legend>
            <table class="table table-striped" cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Número') ?></th>
                    <th scope="col"><?= __('Factura') ?></th>
                </tr>
                <tr>
                    <td><?= h($remito->id) ?></td>
                    <td> <?= $this->Html->link($remito->factura_id, ['controller' => 'Facturas', 'action' => 'view', $remito->factura_id]) ?> </td>
                </tr>
            </table>
        </div>
        <div>
            <legend>Productos incluidos</legend>
            <table class="table table-striped" cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Número') ?></th>
                    <th scope="col"><?= __('Producto') ?></th>
                    <th scope="col"><?= __('Cantidad') ?></th>
                    <th scope="col"><?= __('Precio') ?></th>
                </tr>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= h($producto->id) ?></td>
                        <td> <?= $this->Html->link($producto->producto_id, ['controller' => 'Productos', 'action' => 'view', $producto->producto_id]) ?> </td>
                        <td><?= h($producto->cantidad) ?></td>
                        <td><?= "$".h($producto->precio) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>                
</section>


<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Remito'), ['action' => 'edit', $remito->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Remito'), ['action' => 'delete', $remito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $remito->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Remitos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Remito'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="remitos view large-9 medium-8 columns content">
    <h3><?= h($remito->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Factura') ?></th>
            <td><?= $remito->has('factura') ? $this->Html->link($remito->factura->id, ['controller' => 'Facturas', 'action' => 'view', $remito->factura->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($remito->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($remito->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($remito->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $remito->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Envios') ?></h4>
        <?php if (!empty($remito->envios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Remito Id') ?></th>
                <th scope="col"><?= __('Reserva Id') ?></th>
                <th scope="col"><?= __('Domicilio Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($remito->envios as $envios): ?>
            <tr>
                <td><?= h($envios->id) ?></td>
                <td><?= h($envios->remito_id) ?></td>
                <td><?= h($envios->reserva_id) ?></td>
                <td><?= h($envios->domicilio_id) ?></td>
                <td><?= h($envios->created) ?></td>
                <td><?= h($envios->modified) ?></td>
                <td><?= h($envios->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Envios', 'action' => 'view', $envios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Envios', 'action' => 'edit', $envios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Envios', 'action' => 'delete', $envios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $envios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>-->
