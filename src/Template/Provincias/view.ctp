<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Provincia'), ['action' => 'edit', $provincia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Provincia'), ['action' => 'delete', $provincia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provincia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paises'), ['controller' => 'Paises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Paise'), ['controller' => 'Paises', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Localidades'), ['controller' => 'Localidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Localidade'), ['controller' => 'Localidades', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="provincias view large-9 medium-8 columns content">
    <h3><?= h($provincia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Paise') ?></th>
            <td><?= $provincia->has('paise') ? $this->Html->link($provincia->paise->id, ['controller' => 'Paises', 'action' => 'view', $provincia->paise->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($provincia->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($provincia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($provincia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($provincia->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $provincia->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Localidades') ?></h4>
        <?php if (!empty($provincia->localidades)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Provincia Id') ?></th>
                <th scope="col"><?= __('Duracion Viaje') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($provincia->localidades as $localidades): ?>
            <tr>
                <td><?= h($localidades->id) ?></td>
                <td><?= h($localidades->provincia_id) ?></td>
                <td><?= h($localidades->duracion_viaje) ?></td>
                <td><?= h($localidades->precio) ?></td>
                <td><?= h($localidades->descripcion) ?></td>
                <td><?= h($localidades->created) ?></td>
                <td><?= h($localidades->modified) ?></td>
                <td><?= h($localidades->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Localidades', 'action' => 'view', $localidades->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Localidades', 'action' => 'edit', $localidades->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Localidades', 'action' => 'delete', $localidades->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localidades->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
