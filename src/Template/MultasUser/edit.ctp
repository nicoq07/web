<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $multasUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $multasUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Multas User'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Multas'), ['controller' => 'PagosMultas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Multa'), ['controller' => 'PagosMultas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="multasUser form large-9 medium-8 columns content">
    <?= $this->Form->create($multasUser) ?>
    <fieldset>
        <legend><?= __('Edit Multas User') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('precio');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
