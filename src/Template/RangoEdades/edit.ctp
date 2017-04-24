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
                ['action' => 'delete', $rangoEdade->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $rangoEdade->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rango Edades'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="rangoEdades form large-9 medium-8 columns content">
    <?= $this->Form->create($rangoEdade) ?>
    <fieldset>
        <legend><?= __('Edit Rango Edade') ?></legend>
        <?php
            echo $this->Form->control('rango');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
