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
                ['action' => 'delete', $mediosPago->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mediosPago->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mediosPagos form large-9 medium-8 columns content">
    <?= $this->Form->create($mediosPago) ?>
    <fieldset>
        <legend><?= __('Edit Medios Pago') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
