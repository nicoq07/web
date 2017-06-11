<div class="main-container bkg">
    <section class="duplicatable-content bkg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="col-lg-6 col-lg-offset-3">
                        <h1 class="azul">PRODUCTOS</h1>
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
            
                 <div class="col-lg-3">
                    <?php echo $this->Form->create($productos, ['id' => 'miform']); ?>
                    <?php echo $this->Form->control('categoria_id', ['options' => $categorias, 'empty' => 'Todos', 'label'=>'Filtrar por Categoría:', 'onchange'=>'document.getElementById("miform").submit()']); ?>             
                </div>
                <div class="col-lg-3">
                    <?php 
                        $opciones = ['desc' => 'Mayor Precio', 'asc' => 'Menor Precio'];
                    ?>
                    <?php echo $this->Form->control('precio_ord', ['options' => $opciones, 'empty' => 'Todos', 'label'=>'Filtrar por Precio:', 'onchange'=>'document.getElementById("miform").submit()']); ?>
                    <?php 
                    //$this->Paginator->sort('precio', '<b>Ordenar por precio</b>',
                    //array('escape' => false)) 
                    ?>
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
                          /*echo $this->Form->postLink('Baja', ['action' => 'delete', $producto->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $producto->id, 'class' => 'btn btn-default']);*/
                          echo  $this->Html->link(' + ', ['action' => 'agregarStock', $producto->id], ['class' => 'btn btn-default']);
                          echo  $this->Html->link(' - ', ['action' => 'sacarStock', $producto->id], ['class' => 'btn btn-default']);
                        }
                        
                        	echo $this->Html->link('Ver', ['action' => 'view', $producto->id], ['class' => 'btn btn-default']) ;
                        	echo $this->Html->link('Reservar', ['action' => 'agregarCarro', $producto->id], ['class' => 'btn btn-default']) ;                         
                        ?>
                    </div>
                </div>              
                <?php endforeach; ?>
                <?php echo $this->Form->end(); ?>
            </div>  
        </div>
    </section>
</div>

