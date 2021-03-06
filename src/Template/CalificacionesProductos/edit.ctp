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
                ['action' => 'delete', $calificacionesProducto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $calificacionesProducto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calificaciones Productos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calificacionesProductos form large-9 medium-8 columns content">
    <?= $this->Form->create($calificacionesProducto) ?>
    <fieldset>
        <legend><?= __('Edit Calificaciones Producto') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('producto_id', ['options' => $productos]);
            echo $this->Form->control('calificacion');
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
