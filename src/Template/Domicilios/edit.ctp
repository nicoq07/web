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
                ['action' => 'delete', $domicilio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $domicilio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Domicilios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Localidades'), ['controller' => 'Localidades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Localidade'), ['controller' => 'Localidades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="domicilios form large-9 medium-8 columns content">
    <?= $this->Form->create($domicilio) ?>
    <fieldset>
        <legend><?= __('Edit Domicilio') ?></legend>
        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->control('piso');
            echo $this->Form->control('numero');
            echo $this->Form->control('direccion');
            echo $this->Form->control('localidad_id', ['options' => $localidades]);
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
