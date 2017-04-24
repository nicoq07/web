<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tipo Telefonos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Telefonos'), ['controller' => 'Telefonos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Telefono'), ['controller' => 'Telefonos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoTelefonos form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoTelefono) ?>
    <fieldset>
        <legend><?= __('Add Tipo Telefono') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
