<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estados Reserva'), ['action' => 'edit', $estadosReserva->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estados Reserva'), ['action' => 'delete', $estadosReserva->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estadosReserva->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estados Reservas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estados Reserva'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estadosReservas view large-9 medium-8 columns content">
    <h3><?= h($estadosReserva->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($estadosReserva->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estadosReserva->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($estadosReserva->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($estadosReserva->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $estadosReserva->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
