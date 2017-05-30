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

<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($producto, 	['type' => 'file']) ?>
            <fieldset>
                <legend>Nuevo producto</legend>
                <?php
                    echo $this->Form->control('rango_edad_id', ['options' => $rangoEdades]);
                    echo $this->Form->control('categoria_id', ['options' => $categorias]);
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('informacion');
                    echo $this->Form->control('dimensiones');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('cantidad');
                    echo $this->Form->input('foto[]',['label'=>'Fotos', 'type' => 'file', 'class' => 'btn btn-default', 'data-show-upload' => false, 'data-show-caption' => true, 'multiple class' =>'file-loading', 'accept'=>'image/jpeg, image/png']);
                    echo $this->Form->control('active' , ['label' => 'Activo' ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Crear')) ?>
            <?= $this->Form->end() ?>
           </div>
      </div>
</section>
