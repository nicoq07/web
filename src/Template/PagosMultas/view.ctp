<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagos Multa'), ['action' => 'edit', $pagosMulta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pagos Multa'), ['action' => 'delete', $pagosMulta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosMulta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Multas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Multa'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Multas User'), ['controller' => 'MultasUser', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Multas User'), ['controller' => 'MultasUser', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['controller' => 'MediosPagos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['controller' => 'MediosPagos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pagosMultas view large-9 medium-8 columns content">
    <h3><?= h($pagosMulta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Multas User') ?></th>
            <td><?= $pagosMulta->has('multas_user') ? $this->Html->link($pagosMulta->multas_user->id, ['controller' => 'MultasUser', 'action' => 'view', $pagosMulta->multas_user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Medios Pago') ?></th>
            <td><?= $pagosMulta->has('medios_pago') ? $this->Html->link($pagosMulta->medios_pago->id, ['controller' => 'MediosPagos', 'action' => 'view', $pagosMulta->medios_pago->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pagosMulta->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Monto') ?></th>
            <td><?= $this->Number->format($pagosMulta->monto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pagosMulta->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pagosMulta->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pagado') ?></th>
            <td><?= $pagosMulta->pagado ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
