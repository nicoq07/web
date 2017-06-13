<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($rangoEdade) ?>
            <fieldset>
                <legend>Nuevo rango de edades</legend>
                <?php
                    echo $this->Form->control('rango');
                    echo $this->Form->control('active' , ['label' => 'Activo' ]);
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
        <li><?= $this->Html->link(__('List Rango Edades'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rangoEdades form large-9 medium-8 columns content">
    <?= $this->Form->create($rangoEdade) ?>
    <fieldset>
        <legend><?= __('Add Rango Edade') ?></legend>
        <?php
            echo $this->Form->control('rango');
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
