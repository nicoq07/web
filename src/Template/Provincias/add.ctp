<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Provincias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Paises'), ['controller' => 'Paises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Paise'), ['controller' => 'Paises', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Localidades'), ['controller' => 'Localidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Localidade'), ['controller' => 'Localidades', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="provincias form large-9 medium-8 columns content">
    <?= $this->Form->create($provincia) ?>
    <fieldset>
        <legend><?= __('Add Provincia') ?></legend>
        <?php
            echo $this->Form->control('pais_id', ['options' => $paises]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
