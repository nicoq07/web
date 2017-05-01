<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend>Nuevo producto</legend>
                <?php
                    echo $this->Form->control('rango_edad_id', ['options' => $rangoEdades]);
                    echo $this->Form->control('categoria_id', ['options' => $categorias]);
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('informacion');
                    echo $this->Form->control('dimensiones');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('fotos', ['type'=>'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
           </div>
      </div>
</section>


<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Rango Edades'), ['controller' => 'RangoEdades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rango Edade'), ['controller' => 'RangoEdades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calificaciones Productos'), ['controller' => 'CalificacionesProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calificaciones Producto'), ['controller' => 'CalificacionesProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Factura Productos'), ['controller' => 'FacturaProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Factura Producto'), ['controller' => 'FacturaProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fotos Productos'), ['controller' => 'FotosProductos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fotos Producto'), ['controller' => 'FotosProductos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productos form large-9 medium-8 columns content">
    <?= $this->Form->create($producto) ?>
    <fieldset>
        <legend><?= __('Add Producto') ?></legend>
        <?php
            echo $this->Form->control('rango_edad_id', ['options' => $rangoEdades]);
            echo $this->Form->control('categoria_id', ['options' => $categorias]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('informacion');
            echo $this->Form->control('dimensiones');
            echo $this->Form->control('precio');
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
            echo $this->Form->control('reservas._ids', ['options' => $reservas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
