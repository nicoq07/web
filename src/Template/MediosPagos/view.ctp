<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Medios Pago'), ['action' => 'edit', $mediosPago->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Medios Pago'), ['action' => 'delete', $mediosPago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mediosPago->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mediosPagos view large-9 medium-8 columns content">
    <h3><?= h($mediosPago->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($mediosPago->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mediosPago->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($mediosPago->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($mediosPago->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $mediosPago->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
