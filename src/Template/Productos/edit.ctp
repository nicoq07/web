<h5>&nbsp;</h5>
<div class = "row">
	<div class="col-lg-6  col-lg-offset-3">
	    <?= $this->Form->create($producto) ?>
	    <fieldset>
	        <legend><?= __('Editar producto') ?></legend>
	        <?php
	            echo $this->Form->control('rango_edad_id', ['options' => $rangoEdades , 'label' => 'Rango de Edad']);
	            echo $this->Form->control('categoria_id', ['options' => $categorias]);
	            echo $this->Form->control('descripcion', ['label' => 'Título']);
	            echo $this->Form->label('informacion',['label' => 'Información']);
	            echo $this->Form->textarea('informacion');
	            echo $this->Form->control('dimensiones');
	            echo $this->Form->control('precio');
	            foreach ($fotos as $foto)
	            {
	            	echo $this->Html->image($foto, ['alt' => 'Brownies']);
	            }
	            echo $this->Form->control('active' , ['label' => 'Activo' ]);
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__('Actualizar')) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
<h5>&nbsp;</h5>