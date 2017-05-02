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
                ['action' => 'delete', $fotosProducto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fotosProducto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fotos Productos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fotosProductos form large-9 medium-8 columns content">
    <?= $this->Form->create($fotosProducto) ?>
    <fieldset>
        <legend><?= __('Edit Fotos Producto') ?></legend>
        <?php
            echo $this->Form->control('producto_id', ['options' => $productos]);
            echo $this->Form->control('active');
            echo $this->Form->control('referencia');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
