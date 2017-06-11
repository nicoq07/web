<section class="duplicatable-content bkg">
    <div class="col-lg-8 col-lg-offset-2">                        
        <div>
            <legend>Domicilio</legend>
            <table class="table table-striped" cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Número') ?></th>
                    <th scope="col"><?= __('Usuario') ?></th>
                    <th scope="col"><?= __('Direccion') ?></th>
                    <th scope="col"><?= __('Piso') ?></th>
                    <th scope="col"><?= __('Localidad') ?></th>
                </tr>
                <tr>
                    <td> <?= h($domicilio->id) ?> </td>
                    <td> <?= h($domicilio->user->presentacion) ?> </td>
                    <td><?= h($domicilio->presentacion) ?></td>
                    <td> <?= h($domicilio->piso) ?> </td>
                    <td> <?= h($domicilio->localidade->descripcion) ?> </td>
                </tr>
            </table>
        </div>
    </div>                
</section>

<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Domicilio'), ['action' => 'edit', $domicilio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Domicilio'), ['action' => 'delete', $domicilio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domicilio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Domicilios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Domicilio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Localidades'), ['controller' => 'Localidades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Localidade'), ['controller' => 'Localidades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="domicilios view large-9 medium-8 columns content">
    <h3><?= h($domicilio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $domicilio->has('user') ? $this->Html->link($domicilio->user->id, ['controller' => 'Users', 'action' => 'view', $domicilio->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Piso') ?></th>
            <td><?= h($domicilio->piso) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numero') ?></th>
            <td><?= h($domicilio->numero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direccion') ?></th>
            <td><?= h($domicilio->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Localidade') ?></th>
            <td><?= $domicilio->has('localidade') ? $this->Html->link($domicilio->localidade->id, ['controller' => 'Localidades', 'action' => 'view', $domicilio->localidade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($domicilio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($domicilio->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($domicilio->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $domicilio->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Envios') ?></h4>
        <?php if (!empty($domicilio->envios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Remito Id') ?></th>
                <th scope="col"><?= __('Reserva Id') ?></th>
                <th scope="col"><?= __('Domicilio Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($domicilio->envios as $envios): ?>
            <tr>
                <td><?= h($envios->id) ?></td>
                <td><?= h($envios->remito_id) ?></td>
                <td><?= h($envios->reserva_id) ?></td>
                <td><?= h($envios->domicilio_id) ?></td>
                <td><?= h($envios->created) ?></td>
                <td><?= h($envios->modified) ?></td>
                <td><?= h($envios->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Envios', 'action' => 'view', $envios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Envios', 'action' => 'edit', $envios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Envios', 'action' => 'delete', $envios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $envios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>-->
