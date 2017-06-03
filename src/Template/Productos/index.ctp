<div class="main-container bkg">
    <section class="duplicatable-content bkg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="col-lg-6 col-lg-offset-3">
                        <h1 class="azul">INFLABLES - Chicos y Medianos</h1>
                    </div>
                    <h1>&nbsp;</h1>
                </div>
            </div>
     <div class="row"> 
        <?php if (isset($current_user) && ($current_user['rol_id'] == ADMINISTRADOR || $current_user['rol_id'] == EMPLEADO)) :?>              
            
             
                <div class="col-lg-2 col-lg-offset-10">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?>
                </div>
            
        <?php endif;?>            
            
                <div class="col-lg-5">
                    <?php echo $this->Form->control('categoria_id', ['options' => $categorias, 'empty' => 'Selecione una categoría', 'label'=>'Filtrar por:']); ?>
                </div>
                <div class="col-lg-5">
                    <?php 
//                     echo $this->Form->label('Ordenar por:');
//                     echo $this->Form->select('precio', [
//                         '0'=>'Selecione precio',
//                         '1'=>'Mayor precio',
//                         '2'=>'Menor precio',
//                     ]); ?>
                    <?= $this->Paginator->sort('precio', '<b>Ordenar por precio</b>',
 						array('escape' => false)) ?>
                </div>
            </div>
            <br>
            <div class="row">
                <?php foreach ($productos as $producto): ?>
                <div class="col-lg-4">
                    <div class="blog-snippet-1">
                    	<?php foreach ($fotos as $foto){?>
	                    	<?php if ($producto->id === $foto->producto_id):?>
		                    	<?php if (file_exists(ROOT . DS .$foto->referencia)): ?>
		                    		<a href="<?php echo $this->Url->build([
										    "controller" => "Productos",
										    "action" => "view",
		                    				$producto->id
										]) ?>" >
		                    		 	<img id="Image1" src="<?php echo $foto->referencia; ?>" class="border">
		                    		 </a>
		                    	 <?php endif;
		                    	 break;
		                    	 endif;?>
                    	<?php  }?>
                    	
                       
                        <h4 class="tx_celeste marg"><?= h($producto->descripcion) ?></h4>
                        <p><strong>Medida: </strong><?= h($producto->dimensiones) ?></p>
                        <p><strong>Precio: </strong><?= $this->Number->format($producto->precio,[
                                        'before' => '$',
                                        'locale' => 'es_Ar'
                                        ]) ?></p>
                       
                        <?php 
                        if (isset($current_user) && ($current_user['rol_id'] == ADMINISTRADOR || $current_user['rol_id'] == EMPLEADO)) 
                        {
                          echo	$this->Html->link('Modificar', ['action' => 'edit', $producto->id], ['class' => 'btn btn-default']) ;
                          echo $this->Form->postLink('Baja', ['action' => 'delete', $producto->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $producto->id, 'class' => 'btn btn-default']);
                        }
                        
                        	echo $this->Html->link('Ver', ['action' => 'view', $producto->id], ['class' => 'btn btn-default']) ;
                        	echo $this->Html->link('Reservar', ['action' => 'agregarCarro', $producto->id], ['class' => 'btn btn-default']) ;
                        
                 		
                         
                        ?>
                    </div>
                </div>              
                <?php endforeach; ?>
            </div>  
        </div>
    </section>
</div>

