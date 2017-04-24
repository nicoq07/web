<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Persona'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Domicilios'), ['controller' => 'Domicilios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Domicilio'), ['controller' => 'Domicilios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Telefonos'), ['controller' => 'Telefonos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Telefono'), ['controller' => 'Telefonos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personas view large-9 medium-8 columns content">
    <h3><?= h($persona->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($persona->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($persona->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($persona->apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($persona->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($persona->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($persona->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $persona->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Domicilios') ?></h4>
        <?php if (!empty($persona->domicilios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Persona Id') ?></th>
                <th scope="col"><?= __('Piso') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Direccion') ?></th>
                <th scope="col"><?= __('Localidad Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($persona->domicilios as $domicilios): ?>
            <tr>
                <td><?= h($domicilios->id) ?></td>
                <td><?= h($domicilios->persona_id) ?></td>
                <td><?= h($domicilios->piso) ?></td>
                <td><?= h($domicilios->numero) ?></td>
                <td><?= h($domicilios->direccion) ?></td>
                <td><?= h($domicilios->localidad_id) ?></td>
                <td><?= h($domicilios->created) ?></td>
                <td><?= h($domicilios->modified) ?></td>
                <td><?= h($domicilios->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Domicilios', 'action' => 'view', $domicilios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Domicilios', 'action' => 'edit', $domicilios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Domicilios', 'action' => 'delete', $domicilios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domicilios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Telefonos') ?></h4>
        <?php if (!empty($persona->telefonos)): ?>
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
            <?php foreach ($persona->telefonos as $telefonos): ?>
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
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($persona->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Persona Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Rol Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($persona->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->persona_id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->rol_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
