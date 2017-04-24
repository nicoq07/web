<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Telefonos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Personas'), ['controller' => 'Personas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Persona'), ['controller' => 'Personas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tipo Telefonos'), ['controller' => 'TipoTelefonos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tipo Telefono'), ['controller' => 'TipoTelefonos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="telefonos form large-9 medium-8 columns content">
    <?= $this->Form->create($telefono) ?>
    <fieldset>
        <legend><?= __('Add Telefono') ?></legend>
        <?php
            echo $this->Form->control('persona_id', ['options' => $personas]);
            echo $this->Form->control('tipo_telefono_id', ['options' => $tipoTelefonos]);
            echo $this->Form->control('numero');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
