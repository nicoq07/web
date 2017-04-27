<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pagos Multa'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Multas User'), ['controller' => 'MultasUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Multas User'), ['controller' => 'MultasUser', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['controller' => 'MediosPagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['controller' => 'MediosPagos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosMultas index large-9 medium-8 columns content">
    <h3><?= __('Pagos Multas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('multas_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('medio_pago_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('monto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pagado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pagosMultas as $pagosMulta): ?>
            <tr>
                <td><?= $this->Number->format($pagosMulta->id) ?></td>
                <td><?= $pagosMulta->has('multas_user') ? $this->Html->link($pagosMulta->multas_user->id, ['controller' => 'MultasUser', 'action' => 'view', $pagosMulta->multas_user->id]) : '' ?></td>
                <td><?= $pagosMulta->has('medios_pago') ? $this->Html->link($pagosMulta->medios_pago->id, ['controller' => 'MediosPagos', 'action' => 'view', $pagosMulta->medios_pago->id]) : '' ?></td>
                <td><?= $this->Number->format($pagosMulta->monto) ?></td>
                <td><?= h($pagosMulta->created) ?></td>
                <td><?= h($pagosMulta->modified) ?></td>
                <td><?= h($pagosMulta->pagado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagosMulta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagosMulta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagosMulta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagosMulta->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
