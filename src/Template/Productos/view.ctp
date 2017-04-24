<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rango Edades'), ['controller' => 'RangoEdades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rango Edade'), ['controller' => 'RangoEdades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones Productos'), ['controller' => 'CalificacionesProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificaciones Producto'), ['controller' => 'CalificacionesProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Factura Productos'), ['controller' => 'FacturaProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura Producto'), ['controller' => 'FacturaProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fotos Productos'), ['controller' => 'FotosProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fotos Producto'), ['controller' => 'FotosProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productos view large-9 medium-8 columns content">
    <h3><?= h($producto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rango Edade') ?></th>
            <td><?= $producto->has('rango_edade') ? $this->Html->link($producto->rango_edade->id, ['controller' => 'RangoEdades', 'action' => 'view', $producto->rango_edade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $producto->has('categoria') ? $this->Html->link($producto->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $producto->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($producto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Informacion') ?></th>
            <td><?= h($producto->informacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dimensiones') ?></th>
            <td><?= h($producto->dimensiones) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($producto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($producto->precio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($producto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($producto->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $producto->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Calificaciones Productos') ?></h4>
        <?php if (!empty($producto->calificaciones_productos)): ?>
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
            <?php foreach ($producto->calificaciones_productos as $calificacionesProductos): ?>
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
        <h4><?= __('Related Factura Productos') ?></h4>
        <?php if (!empty($producto->factura_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col"><?= __('Factura Id') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($producto->factura_productos as $facturaProductos): ?>
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
        <h4><?= __('Related Fotos Productos') ?></h4>
        <?php if (!empty($producto->fotos_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($producto->fotos_productos as $fotosProductos): ?>
            <tr>
                <td><?= h($fotosProductos->id) ?></td>
                <td><?= h($fotosProductos->producto_id) ?></td>
                <td><?= h($fotosProductos->file) ?></td>
                <td><?= h($fotosProductos->created) ?></td>
                <td><?= h($fotosProductos->modified) ?></td>
                <td><?= h($fotosProductos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FotosProductos', 'action' => 'view', $fotosProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FotosProductos', 'action' => 'edit', $fotosProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FotosProductos', 'action' => 'delete', $fotosProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reservas') ?></h4>
        <?php if (!empty($producto->reservas)): ?>
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
            <?php foreach ($producto->reservas as $reservas): ?>
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
