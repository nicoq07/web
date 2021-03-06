<section class="duplicatable-content bkg">
        <div class="col-lg-8 col-lg-offset-2">                        
            <div>
                <legend>Detalle de la reserva</legend>
                <div class="row">
                    <div class="col-lg-6">
                        <h4><strong>Número: </strong></h4>
                        <h6 class="tx_gris"><?= h($reserva->id) ?></h6>
                    </div>
                    <div class="col-lg-6">
                        <h4><strong>Estado: </strong></h4>
                        <h6 class="tx_gris"><?= $reserva->has('estados_reserva') ? h($reserva->estados_reserva->descripcion) : '' ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <h4><strong>Inicio del evento: </strong></h4>
                        <h6 class="tx_gris"><?= h($reserva->fecha_inicio->format("d/m/y h:i A")) ?></h6>
                    </div>
                    <div class="col-lg-6">
                        <h4><strong>Finalización del evento: </strong></h4>
                        <h6 class="tx_gris"><?= h($reserva->fecha_fin->format("d/m/y h:i A")) ?></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <legend>Productos</legend>
                        <?php if (!empty($reserva->productos)): ?>
                            <table class="table table-striped" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th scope="col"><?= __('Código') ?></th>
                                    <th scope="col"><?= __('Rango Edad') ?></th>
                                    <th scope="col"><?= __('Categoria') ?></th>
                                    <th scope="col"><?= __('Descripción') ?></th>
                                    <th scope="col"><?= __('Informacion') ?></th>
                                    <th scope="col"><?= __('Dimensiones') ?></th>
                                </tr>
                                <?php foreach ($reserva->productos as $productos): ?>
                                <tr>
                                    <td><?= h($productos->id) ?></td>
                                    <td><?= h($productos->rango_edad_id->rango) ?></td>
                                    <td><?= h($productos->categoria_id->descripcion) ?></td>
                                    <td><?= h($productos->descripcion) ?></td>
                                    <td><?= h($productos->informacion) ?></td>
                                    <td><?= h($productos->dimensiones) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <legend>Factura</legend>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4><strong>Número: </strong></h4>
                                <h6 class="tx_gris"><?= h($reserva->facturas[0]->id) ?></h6>
                            </div>
                            <div class="col-lg-6">
                                <h4><strong>Monto: </strong></h4>
                                <h6 class="tx_gris"><?= h("$".$reserva->facturas[0]->monto) ?></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4><strong>Porcentaje pagado: </strong></h4>
                                <h6 class="tx_gris">
                                    <?php 
                                    $texto = "%".$reserva->facturas[0]->porcentajePago*100;
                                    $texto = $texto.' - $'.$reserva->facturas[0]->porcentajePago*$reserva->facturas[0]->monto;
                                    echo $texto;
                                    ?>
                                </h6>
                            </div>
                            <div class="col-lg-6">
                                <h4><strong>Pagada por completo: </strong></h4>
                                <h6 class="tx_gris">
                                    <?php 
                                    if ($reserva->facturas[0]->pagado == 1) {
                                        echo "Si";
                                    } else {
                                        echo "No";
                                    }
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <legend>Pagos realizados</legend>
                        <?php if (!empty($recibos)): ?>
                            <table class="table table-striped" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th scope="col"><?= __('Recibo') ?></th>
                                    <th scope="col"><?= __('Monto') ?></th>
                                    <th scope="col"><?= __('Fecha de pago') ?></th>
                                </tr>
                                <?php foreach ($recibos as $recibo): ?>
                                <tr>
                                    <td><?= h($recibo->id) ?></td>
                                    <td><?= h("$".$recibo->monto) ?></td>
                                    <td><?= h($recibo->created->format("d/m/y h:i A")) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <legend>Envíos</legend>
                        <?php if (!empty($reserva->envios)): ?>
                            <table class="table table-striped" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th scope="col"><?= __('Remito') ?></th>
                                    <th scope="col"><?= __('Dirección') ?></th>
                                    <th scope="col"><?= __('Tiempo estimado de viaje') ?></th>
                                </tr>
                                <?php foreach ($reserva->envios as $envio): ?>
                                <tr>
                                    <td><?= h($envio->remito_id) ?></td>
                                    <td><?= h($domicilio->presentacion." ".$localidad->descripcion) ?></td>
                                    <td><?= h($localidad->duracion_viaje." min.") ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
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
        <li><?= $this->Html->link(__('Edit Reserva'), ['action' => 'edit', $reserva->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reserva'), ['action' => 'delete', $reserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserva->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estados Reservas'), ['controller' => 'EstadosReservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estados Reserva'), ['controller' => 'EstadosReservas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reservas view large-9 medium-8 columns content">
    <h3><?= h($reserva->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $reserva->has('user') ? $this->Html->link($reserva->user->id, ['controller' => 'Users', 'action' => 'view', $reserva->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estados Reserva') ?></th>
            <td><?= $reserva->has('estados_reserva') ? $this->Html->link($reserva->estados_reserva->id, ['controller' => 'EstadosReservas', 'action' => 'view', $reserva->estados_reserva->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($reserva->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($reserva->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($reserva->fecha_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($reserva->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($reserva->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $reserva->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Envios') ?></h4>
        <?php if (!empty($reserva->envios)): ?>
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
            <?php foreach ($reserva->envios as $envios): ?>
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
    <div class="related">
        <h4><?= __('Related Facturas') ?></h4>
        <?php if (!empty($reserva->facturas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Reserva Id') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reserva->facturas as $facturas): ?>
            <tr>
                <td><?= h($facturas->id) ?></td>
                <td><?= h($facturas->reserva_id) ?></td>
                <td><?= h($facturas->monto) ?></td>
                <td><?= h($facturas->created) ?></td>
                <td><?= h($facturas->modified) ?></td>
                <td><?= h($facturas->pagado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Facturas', 'action' => 'view', $facturas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Facturas', 'action' => 'edit', $facturas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Facturas', 'action' => 'delete', $facturas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facturas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pagos Reserva') ?></h4>
        <?php if (!empty($reserva->pagos_reserva)): ?>
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
            <?php foreach ($reserva->pagos_reserva as $pagosReserva): ?>
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
        <h4><?= __('Related Productos') ?></h4>
        <?php if (!empty($reserva->productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Rango Edad Id') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Informacion') ?></th>
                <th scope="col"><?= __('Dimensiones') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($reserva->productos as $productos): ?>
            <tr>
                <td><?= h($productos->id) ?></td>
                <td><?= h($productos->rango_edad_id) ?></td>
                <td><?= h($productos->categoria_id) ?></td>
                <td><?= h($productos->descripcion) ?></td>
                <td><?= h($productos->informacion) ?></td>
                <td><?= h($productos->dimensiones) ?></td>
                <td><?= h($productos->precio) ?></td>
                <td><?= h($productos->created) ?></td>
                <td><?= h($productos->modified) ?></td>
                <td><?= h($productos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Productos', 'action' => 'view', $productos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Productos', 'action' => 'edit', $productos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Productos', 'action' => 'delete', $productos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>-->