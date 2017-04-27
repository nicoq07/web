<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Multas User'), ['action' => 'edit', $multasUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Multas User'), ['action' => 'delete', $multasUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multasUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Multas User'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Multas User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pagos Multas'), ['controller' => 'PagosMultas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagos Multa'), ['controller' => 'PagosMultas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="multasUser view large-9 medium-8 columns content">
    <h3><?= h($multasUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $multasUser->has('user') ? $this->Html->link($multasUser->user->id, ['controller' => 'Users', 'action' => 'view', $multasUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($multasUser->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($multasUser->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($multasUser->precio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($multasUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($multasUser->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $multasUser->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Pagos Multas') ?></h4>
        <?php if (!empty($multasUser->pagos_multas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Multas User Id') ?></th>
                <th scope="col"><?= __('Medio Pago Id') ?></th>
                <th scope="col"><?= __('Monto') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Pagado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($multasUser->pagos_multas as $pagosMultas): ?>
            <tr>
                <td><?= h($pagosMultas->id) ?></td>
                <td><?= h($pagosMultas->multas_user_id) ?></td>
                <td><?= h($pagosMultas->medio_pago_id) ?></td>
                <td><?= h($pagosMultas->monto) ?></td>
                <td><?= h($pagosMultas->created) ?></td>
                <td><?= h($pagosMultas->modified) ?></td>
                <td><?= h($pagosMultas->pagado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PagosMultas', 'action' => 'view', $pagosMultas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PagosMultas', 'action' => 'edit', $pagosMultas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PagosMultas', 'action' => 'delete', $pagosMultas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosMultas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
