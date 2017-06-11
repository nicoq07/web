<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Registro') ?></legend>
                <?php
                	echo $this->Form->control('rol_id', ['options' => $roles, 'empty' => true]);
                    echo $this->Form->control('dni');
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    echo $this->Form->control('active',['label' => 'Activo']);
                ?>
            </fieldset>
            <?= $this->Form->button('Modificar') ?>
            <?= $this->Form->end() ?>
           </div>
      </div>
</section>


