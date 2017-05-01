<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Localidade'), ['action' => 'edit', $localidade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Localidade'), ['action' => 'delete', $localidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localidade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Localidades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Localidade'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="localidades view large-9 medium-8 columns content">
    <h3><?= h($localidade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td><?= $localidade->has('provincia') ? $this->Html->link($localidade->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $localidade->provincia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($localidade->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($localidade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duracion Viaje') ?></th>
            <td><?= $this->Number->format($localidade->duracion_viaje) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($localidade->precio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($localidade->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($localidade->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $localidade->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
