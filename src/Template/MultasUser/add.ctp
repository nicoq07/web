<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($multasUser) ?>
            <fieldset>
                <legend>Nueva multa</legend>
                <?php
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('precio');
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
        <li><?= $this->Html->link(__('List Multas User'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Multas'), ['controller' => 'PagosMultas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Multa'), ['controller' => 'PagosMultas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="multasUser form large-9 medium-8 columns content">
    <?= $this->Form->create($multasUser) ?>
    <fieldset>
        <legend><?= __('Add Multas User') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('descripcion');
            echo $this->Form->control('precio');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->