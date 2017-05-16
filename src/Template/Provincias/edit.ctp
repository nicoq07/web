<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($provincia) ?>
            <fieldset>
                <legend>Modificar provincia</legend>
                <?php
                    echo $this->Form->control('pais_id', ['options' => $paises]);
                    echo $this->Form->control('descripcion');
                ?>
            </fieldset>
            <?= $this->Form->button('Modificar') ?>
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
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $provincia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $provincia->id)]
            )
        ?></li>
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
        <legend><?= __('Edit Provincia') ?></legend>
        <?php
            echo $this->Form->control('pais_id', ['options' => $paises]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->