<div class="row">
    <div class="col-md-6 col-md-offset-3">
      
       
         <legend><?= __('Registro') ?></legend>
            
          <?= $this->Form->create($user) ?>
          
            <?php
                echo $this->Form->control('persona_id', ['options' => $personas]);
                echo $this->Form->control('email');
                echo $this->Form->control('password');
                echo $this->Form->control('rol_id', ['options' => $roles, 'empty' => true]);
                echo $this->Form->control('active');
            ?>
       
        <?= $this->Form->button(__('Crear')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>