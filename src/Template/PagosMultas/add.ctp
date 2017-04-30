<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($pagosMulta) ?>
            <fieldset>
                <legend>Nuevo pago</legend>
                <?php
                    echo $this->Form->control('multas_user_id', ['options' => $multasUser]);
                    echo $this->Form->control('medio_pago_id', ['options' => $mediosPagos]);
                    echo $this->Form->control('monto');
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
        <li><?= $this->Html->link(__('List Pagos Multas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Multas User'), ['controller' => 'MultasUser', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Multas User'), ['controller' => 'MultasUser', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Medios Pagos'), ['controller' => 'MediosPagos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Medios Pago'), ['controller' => 'MediosPagos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pagosMultas form large-9 medium-8 columns content">
    <?= $this->Form->create($pagosMulta) ?>
    <fieldset>
        <legend><?= __('Add Pagos Multa') ?></legend>
        <?php
            echo $this->Form->control('multas_user_id', ['options' => $multasUser]);
            echo $this->Form->control('medio_pago_id', ['options' => $mediosPagos]);
            echo $this->Form->control('monto');
            echo $this->Form->control('pagado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
