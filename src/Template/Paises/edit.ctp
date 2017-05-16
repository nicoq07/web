<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($paise) ?>
            <fieldset>
                <legend>Modificar país</legend>
                <?php
                    echo $this->Form->control('abreviatura');
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
                ['action' => 'delete', $paise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $paise->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Paises'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="paises form large-9 medium-8 columns content">
    <?= $this->Form->create($paise) ?>
    <fieldset>
        <legend><?= __('Edit Paise') ?></legend>
        <?php
            echo $this->Form->control('abreviatura');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->