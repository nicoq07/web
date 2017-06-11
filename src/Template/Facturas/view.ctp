<section class="duplicatable-content bkg">
    <div class="col-lg-8 col-lg-offset-2">                        
        <div>
            <legend>Detalle de la factura</legend>
            <table class="table table-striped" cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Número') ?></th>
                    <th scope="col"><?= __('Reserva') ?></th>
                    <th scope="col"><?= __('Porcentaje pago') ?></th>
                    <th scope="col"><?= __('Paga') ?></th>
                    <th scope="col"><?= __('Estado') ?></th>
                </tr>
                <tr>
                    <td><?= h($factura->id) ?></td>
                    <td> <?= $this->Html->link($factura->reserva_id, ['controller' => 'Reservas', 'action' => 'view', $factura->reserva_id]) ?> </td>
                    <td><?= "%".h(($factura->porcentajePago) * 100) ?></td>
                    <td><?php
                        if ($factura->pagado == 1) {
                            echo "Si";
                        } else {
                            echo "No";
                        } ?>
                    </td>
                    <td><?php
                        if ($factura->active == 1) {
                            echo "Vigente";
                        } else {
                            echo "Anulada";
                        } ?>
                    </td>
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
                <?php foreach ($factura->factura_productos as $producto): ?>
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
        <li><?= $this->Html->link(__('Edit Factura'), ['action' => 'edit', $factura->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Factura'), ['action' => 'delete', $factura->id], ['confirm' => __('Are you sure you want to delete # {0}?', $factura->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Facturas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Factura Productos'), ['controller' => 'FacturaProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura Producto'), ['controller' => 'FacturaProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recibos'), ['controller' => 'Recibos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recibo'), ['controller' => 'Recibos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Remitos'), ['controller' => 'Remitos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Remito'), ['controller' => 'Remitos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="facturas view large-9 medium-8 columns content">
    <h3><?= h($factura->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reserva') ?></th>
            <td><?= $factura->has('reserva') ? $this->Html->link($factura->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $factura->reserva->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($factura->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($factura->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($factura->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($factura->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pagado') ?></th>
            <td><?= $factura->pagado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Factura Productos') ?></h4>
        <?php if (!empty($factura->factura_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col"><?= __('Factura Id') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($factura->factura_productos as $facturaProductos): ?>
            <tr>
                <td><?= h($facturaProductos->id) ?></td>
                <td><?= h($facturaProductos->producto_id) ?></td>
                <td><?= h($facturaProductos->factura_id) ?></td>
                <td><?= h($facturaProductos->cantidad) ?></td>
                <td><?= h($facturaProductos->precio) ?></td>
                <td><?= h($facturaProductos->created) ?></td>
                <td><?= h($facturaProductos->modified) ?></td>
                <td><?= h($facturaProductos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FacturaProductos', 'action' => 'view', $facturaProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FacturaProductos', 'action' => 'edit', $facturaProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FacturaProductos', 'action' => 'delete', $facturaProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facturaProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Recibos') ?></h4>
        <?php if (!empty($factura->recibos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Factura Id') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($factura->recibos as $recibos): ?>
            <tr>
                <td><?= h($recibos->id) ?></td>
                <td><?= h($recibos->factura_id) ?></td>
                <td><?= h($recibos->monto) ?></td>
                <td><?= h($recibos->created) ?></td>
                <td><?= h($recibos->modified) ?></td>
                <td><?= h($recibos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Recibos', 'action' => 'view', $recibos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Recibos', 'action' => 'edit', $recibos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Recibos', 'action' => 'delete', $recibos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recibos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Remitos') ?></h4>
        <?php if (!empty($factura->remitos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Factura Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($factura->remitos as $remitos): ?>
            <tr>
                <td><?= h($remitos->id) ?></td>
                <td><?= h($remitos->factura_id) ?></td>
                <td><?= h($remitos->created) ?></td>
                <td><?= h($remitos->modified) ?></td>
                <td><?= h($remitos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Remitos', 'action' => 'view', $remitos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Remitos', 'action' => 'edit', $remitos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Remitos', 'action' => 'delete', $remitos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $remitos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>-->