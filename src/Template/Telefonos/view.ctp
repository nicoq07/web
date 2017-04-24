<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Telefono'), ['action' => 'edit', $telefono->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Telefono'), ['action' => 'delete', $telefono->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telefono->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Telefonos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Telefono'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Telefonos'), ['controller' => 'TipoTelefonos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Telefono'), ['controller' => 'TipoTelefonos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="telefonos view large-9 medium-8 columns content">
    <h3><?= h($telefono->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Persona') ?></th>
            <td><?= $telefono->has('persona') ? $this->Html->link($telefono->persona->id, ['controller' => 'Personas', 'action' => 'view', $telefono->persona->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Telefono') ?></th>
            <td><?= $telefono->has('tipo_telefono') ? $this->Html->link($telefono->tipo_telefono->id, ['controller' => 'TipoTelefonos', 'action' => 'view', $telefono->tipo_telefono->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($telefono->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($telefono->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($telefono->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($telefono->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $telefono->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
