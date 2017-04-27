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
                ['action' => 'delete', $localidade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $localidade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Localidades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="localidades form large-9 medium-8 columns content">
    <?= $this->Form->create($localidade) ?>
    <fieldset>
        <legend><?= __('Edit Localidade') ?></legend>
        <?php
            echo $this->Form->control('provincia_id', ['options' => $provincias]);
            echo $this->Form->control('duracion_viaje');
            echo $this->Form->control('precio');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
