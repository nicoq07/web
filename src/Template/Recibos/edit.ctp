<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($recibo) ?>
            <fieldset>
                <legend>Modificar recibo</legend>
                <?php
                    echo $this->Form->control('factura_id', ['options' => $facturas]);
                    echo $this->Form->control('monto');
                    echo $this->Form->control('pagado');
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
                ['action' => 'delete', $recibo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recibo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Recibos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recibos form large-9 medium-8 columns content">
    <?= $this->Form->create($recibo) ?>
    <fieldset>
        <legend><?= __('Edit Recibo') ?></legend>
        <?php
            echo $this->Form->control('factura_id', ['options' => $facturas]);
            echo $this->Form->control('monto');
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->