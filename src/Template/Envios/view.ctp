<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Envio'), ['action' => 'edit', $envio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Envio'), ['action' => 'delete', $envio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $envio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Envios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Envio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Remitos'), ['controller' => 'Remitos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Remito'), ['controller' => 'Remitos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Domicilios'), ['controller' => 'Domicilios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Domicilio'), ['controller' => 'Domicilios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="envios view large-9 medium-8 columns content">
    <h3><?= h($envio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Remito') ?></th>
            <td><?= $envio->has('remito') ? $this->Html->link($envio->remito->id, ['controller' => 'Remitos', 'action' => 'view', $envio->remito->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserva') ?></th>
            <td><?= $envio->has('reserva') ? $this->Html->link($envio->reserva->id, ['controller' => 'Reservas', 'action' => 'view', $envio->reserva->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Domicilio') ?></th>
            <td><?= $envio->has('domicilio') ? $this->Html->link($envio->domicilio->id, ['controller' => 'Domicilios', 'action' => 'view', $envio->domicilio->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($envio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($envio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($envio->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $envio->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
