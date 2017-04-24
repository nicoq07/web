<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Telefono'), ['action' => 'edit', $tipoTelefono->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Telefono'), ['action' => 'delete', $tipoTelefono->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoTelefono->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Telefonos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Telefono'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Telefonos'), ['controller' => 'Telefonos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Telefono'), ['controller' => 'Telefonos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoTelefonos view large-9 medium-8 columns content">
    <h3><?= h($tipoTelefono->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($tipoTelefono->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tipoTelefono->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tipoTelefono->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($tipoTelefono->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $tipoTelefono->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Telefonos') ?></h4>
        <?php if (!empty($tipoTelefono->telefonos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Persona Id') ?></th>
                <th scope="col"><?= __('Tipo Telefono Id') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tipoTelefono->telefonos as $telefonos): ?>
            <tr>
                <td><?= h($telefonos->id) ?></td>
                <td><?= h($telefonos->persona_id) ?></td>
                <td><?= h($telefonos->tipo_telefono_id) ?></td>
                <td><?= h($telefonos->numero) ?></td>
                <td><?= h($telefonos->created) ?></td>
                <td><?= h($telefonos->modified) ?></td>
                <td><?= h($telefonos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Telefonos', 'action' => 'view', $telefonos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Telefonos', 'action' => 'edit', $telefonos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Telefonos', 'action' => 'delete', $telefonos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $telefonos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
