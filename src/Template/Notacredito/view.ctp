<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notacredito'), ['action' => 'edit', $notacredito->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notacredito'), ['action' => 'delete', $notacredito->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notacredito->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notacredito'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notacredito'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notacredito view large-9 medium-8 columns content">
    <h3><?= h($notacredito->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Factura') ?></th>
            <td><?= $notacredito->has('factura') ? $this->Html->link($notacredito->factura->id, ['controller' => 'Facturas', 'action' => 'view', $notacredito->factura->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($notacredito->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($notacredito->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($notacredito->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($notacredito->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $notacredito->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
