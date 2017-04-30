<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($paise) ?>
            <fieldset>
                <legend>Nuevo país</legend>
                <?php
                    echo $this->Form->control('abreviatura');
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
        <li><?= $this->Html->link(__('List Paises'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="paises form large-9 medium-8 columns content">
    <?= $this->Form->create($paise) ?>
    <fieldset>
        <legend><?= __('Add Paise') ?></legend>
        <?php
            echo $this->Form->control('abreviatura');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
