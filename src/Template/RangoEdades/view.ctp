<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rango Edade'), ['action' => 'edit', $rangoEdade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rango Edade'), ['action' => 'delete', $rangoEdade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rangoEdade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rango Edades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rango Edade'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rangoEdades view large-9 medium-8 columns content">
    <h3><?= h($rangoEdade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rango') ?></th>
            <td><?= h($rangoEdade->rango) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($rangoEdade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rangoEdade->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rangoEdade->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $rangoEdade->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
