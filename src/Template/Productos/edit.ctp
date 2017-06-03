<script>
$(document).on('ready', function() {    
    $('#foto').fileinput({          
        allowedFileExtensions: ["jpg", "png"],
        maxFileCount: 4,
        dropZoneTitle: 'Arrastre y suelte sus archivos aquí...',
        removeTitle: 'Eliminar archivos seleccionados',
        msgSelected: '{n} archivos seleccionados',
        browseLabel: "Agregar",
        browseIcon: "<i class=\"glyphicon glyphicon-plus\"></i>",
        removeLabel: "Eliminar",
        uploadUrl: '/file-upload-batch/',
        showUpload: false,
        layoutTemplates: {actionUpload: ''},
        mainClass: "input-group-lg"
    });
});
</script>

<h5>&nbsp;</h5>
<div class = "row">
	<div class="col-lg-8  col-lg-offset-2">
	    <?= $this->Form->create($producto,['type' => 'file']) ?>
	    <fieldset>
	        <legend><?= __('Editar producto') ?></legend>
	        <?php
	            echo $this->Form->control('rango_edad_id', ['options' => $rangoEdades , 'label' => 'Rango de Edad']);
	            echo $this->Form->control('categoria_id', ['options' => $categorias]);
	            echo $this->Form->control('descripcion', ['label' => 'Título']);
	            echo $this->Form->label('informacion',['label' => 'Información']);
	            echo $this->Form->textarea('informacion');
	            echo $this->Form->control('dimensiones');
	            echo $this->Form->control('precio');?>
				<div class="row">
	            
        <?php    foreach ($producto->fotos_productos as $foto)
	            { 
	            {?>
	            	<div class="col-lg-4" style="border-radius: 5px; border: 1px solid #000000;">
	            	<div style= "padding:5px 0px 0px 0px; text-align:center">
	            	<img style= "padding:0px 0px 5px 0px" id="Image1" src="<?php echo "../../".$foto->referencia; ?>">
	            	 <?php echo $this->Form->button('X', ['controller' => 'FotosProductos', 'action' => 'delete', $foto->id],['confirm' => '¿Está seguro que desea eliminarlo?', 'class' => 'btn']) ?>
	            	</div>
	            	</div>
	            <?php }
	            	
	            }?>
				
				</div>
				<h5>&nbsp;</h5>
				<?php
				
	            echo $this->Form->input('foto[]',['label'=>'Agregar más fotos', 'type' => 'file', 'class' => 'btn btn-default', 'data-show-upload' => false, 'data-show-caption' => true, 'multiple class' =>'file-loading', 'accept'=>'image/jpeg, image/png']);
	           
	        ?>
	    </fieldset>
	    <?= $this->Form->button(__('Actualizar')) ?>
	    <?= $this->Form->end() ?>
	</div>
</div>
<h5>&nbsp;</h5>