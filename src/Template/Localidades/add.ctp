<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($localidade) ?>
            <fieldset>
                <legend>Nueva localidad</legend>
                <?php
                    echo $this->Form->control('provincia_id', ['options' => $provincias]);
                    echo $this->Form->control('duracion_viaje');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('descripcion');
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
        <li><?= $this->Html->link(__('List Localidades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="localidades form large-9 medium-8 columns content">
    <?= $this->Form->create($localidade) ?>
    <fieldset>
        <legend><?= __('Add Localidade') ?></legend>
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
</div>-->
