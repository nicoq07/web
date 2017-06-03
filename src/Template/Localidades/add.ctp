<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($localidade) ?>
            <fieldset>
                <legend>Nueva localidad</legend>
                <?php
                    echo $this->Form->control('provincia_id', ['options' => $provincias]);
                    echo $this->Form->control('descripcion', ['label' => 'Nombre']);
                    echo $this->Form->control('duracion_viaje', ['label' => 'Duración del viaje']);
                    echo $this->Form->control('precio');
                    echo $this->Form->control('active' , ['label' => 'Activo' ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
           </div>
      </div>
</section>


