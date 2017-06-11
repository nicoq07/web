<?php
/**
  * @var \App\View\AppView $this
  */
?>

<section class="duplicatable-content bkg">
    <div class="col-lg-8 col-lg-offset-2">                        
        <div>
            <legend>Detalle del recibo</legend>
            <table class="table table-striped" cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Número') ?></th>
                    <th scope="col"><?= __('Factura') ?></th>
                    <th scope="col"><?= __('Monto') ?></th>
                    <th scope="col"><?= __('Fecha de pago') ?></th>
                </tr>
                <tr>
                    <td><?= h($recibo->id) ?></td>
                    <td> <?= $this->Html->link($recibo->factura_id, ['controller' => 'Facturas', 'action' => 'view', $recibo->factura_id]) ?> </td>
                    <td><?= "$".h($recibo->monto) ?></td>
                    <td><?= h(date_format($recibo->created, "d/m/Y H:i"))." hs." ?></td>
                </tr>
            </table>
        </div>
    </div>                
</section>

<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Recibo'), ['action' => 'edit', $recibo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Recibo'), ['action' => 'delete', $recibo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recibo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Recibos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Recibo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recibos view large-9 medium-8 columns content">
    <h3><?= h($recibo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Factura') ?></th>
            <td><?= $recibo->has('factura') ? $this->Html->link($recibo->factura->id, ['controller' => 'Facturas', 'action' => 'view', $recibo->factura->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($recibo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($recibo->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($recibo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($recibo->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $recibo->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>-->