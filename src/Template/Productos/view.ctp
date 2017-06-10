<span class="background-image-holder parallax-background"></span>

<style type="text/css">

input[type="radio"] {
  display: none;
}

label {
  color: grey;
}

.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
  color: orange;
}

input[type="radio"]:checked ~ label {
  color: orange;
}
</style>

<div class="container">
    <div class="row">
        <br>
        <div class="col-lg-6">          
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="carousel-inner" role="listbox">
                    <?php $bool = true;?>
                    <?php foreach ($producto->fotos_productos as $foto):?>
					<?php if (file_exists(ROOT . DS .$foto->referencia)):
					if ($bool){ $bool = false;?>
                   		<div class="item active ">
                   	<?php } else { ?>
                   		<div class="item">
                   <?php }?>
                        <img src="../../<?php echo $foto->referencia ?>">                   
                    </div>
					<?php endif; endforeach;?>
                      
                </div>          
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <h1 style="color: black"><?= h($producto->descripcion)?></h1>
            <h4 style="color: black"><strong>Categoría: </strong><?= h($producto->categoria->descripcion)?></h4><br>
            <h4 style="color: black"><strong>Stock: </strong><?= h($producto->cantidad)?></h4><br>
            <h4 style="color: black"><strong>Información: </strong><?= h($producto->informacion)?></h4><br>
            <h4 style="color: black"><strong>Medidas: </strong><?= h($producto->dimensiones)?></h4><br>
            <h4 style="color: black"><strong>Precio: </strong><?= h("$".$producto->precio)?></h4><br>
            <!--button class="btn btn-default right">Reservar <i class="icon-cart"></i></button-->
            <?= $this->Html->link('Reservar', ['action' => 'agregarCarro', $producto->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <br>
            <h1 style="color: black">Disponibilidad:</h1><br>
            <h4 style="color: black"><strong>Referencias: </strong></h4>
            <h4 style="color: green">Disponible</h4>
            <h4 style="color: yellow">Existen reservas</h4>   
            <h4 style="color: red">No Disponible</h4><br>
            <br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fecha\Hora</th>
                        <th>9:00</th>
                        <th>10:00</th>
                        <th>11:00</th>
                        <th>12:00</th>
                        <th>13:00</th>
                        <th>14:00</th>
                        <th>15:00</th>
                        <th>16:00</th>
                        <th>17:00</th>
                        <th>18:00</th>
                        <th>19:00</th>
                        <th>20:00</th>
                        <th>21:00</th>
                        <th>22:00</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($dia = current($tabla)){ ?>
                    <tr>
                        <td><?php echo date_format(new \DateTime((string)key($tabla)), 'd-m-Y'); ?></td>
                        <?php foreach ($dia as $hora){?>
                        <td bgcolor="
                        <?php
                        if ($hora == 0)
                            echo "#33cc33";
                        else{
                            if ($hora == 1)
                                echo "#ffcc00";
                            else
                                echo "#ff0000";
                        }
                        ?>
                        "></td>
                        <?php  }?>
                    </tr>
                    <?php next($tabla);} ?>
                </tbody>
            </table>
            <!--<div class="paginator centrar">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . 'Primera') ?>
                    <?= $this->Paginator->prev('< ' . 'Anterior') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('Siguiente' . ' >') ?>
                    <?= $this->Paginator->last('Última' . ' >>') ?>
                </ul>
            </div>-->
        </div>
    </div>
</div>

<?php 
$comentarioGuardado = "";
$calificacionGuardada = 1;
if (!empty($producto->calificaciones_productos)) { ?>
<div class="container">
<h2>Calificaciones</h2>   
    <?php 
        $cont = 0;        
        foreach ($producto->calificaciones_productos as $calificacion):?>
    <div class="row">
        <div class="col-lg-2">
            <h4 class="clasificacion centrar">
                <?php                    
                    if ($calificacion->user_id == $this->viewVars['current_user']['id']) {
                        $comentarioGuardado = $calificacion->comentario;
                        $calificacionGuardada = $calificacion->calificacion;
                    }
                    $estrellas = "";
                    for ($i=5; $i >=1 ; $i--) { 
                        $estrellas = '<input id="radio'.$i.'" type="radio" name="estrellas'.$cont.'" value="'.$i.'" disabled="true"';
                        if ($i == $calificacion->calificacion) {
                            $estrellas .= 'checked="checked"';
                        }
                        $estrellas .= '> <label for="radio'.$i.'">★</label>';
                        echo($estrellas);
                    }
                    $cont ++;
                ?>
            </h4>
        </div>
        <div class="col-lg-10">
            <blockquote>
                <p>
                    <?= h($calificacion->comentario) ?>
                </p>
            </blockquote>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php } ?>

<div class="container">
    <?= $this->Form->create($producto) ?>
    <h2>Calificá este producto</h2>
    <fieldset>
    <div class="row">
        <div class="col-lg-2">
            <h4 class="clasificacion centrar">
                <?php
                $estrellas = "";
                    for ($i=5; $i >=1 ; $i--) { 
                        $estrellas = '<input id="radios'.$i.'" type="radio" name="calificacion" value="'.$i.'"';
                        if ($i == $calificacionGuardada) {
                            $estrellas .= 'checked="checked"';
                        }
                        $estrellas .= '> <label for="radios'.$i.'">★</label>';
                        echo($estrellas);
                    }
                ?>
            </h4>
        </div>
        <div class="col-lg-10">
            <blockquote>
                <?php
                    echo $this->Form->control('comentario', ['value' => $comentarioGuardado]);
                ?>
                <?= $this->Form->button(__('Calificar')) ?>
                <?php //$this->Html->link('Enviar', ['action' => 'calificar'], ['class' => 'btn btn-default', 'type'=>'submit']); ?>
            </blockquote>
        </div>
    </div>
    </fieldset>
    
    <?= $this->Form->end() ?>
</div>

<!--<div class="container">
<h2>Calificaciones</h2>
    <div class="row">
        <div class="col-lg-2">
            <h4 class="clasificacion centrar">
                <input id="radio1" type="radio" name="estrellas1" value="5" disabled="true">
                <label for="radio1">★</label>
                <input id="radio2" type="radio" name="estrellas1" value="4" disabled="true">
                <label for="radio2">★</label>
                <input id="radio3" type="radio" name="estrellas1" value="3" checked="checked" disabled="true">
                <label for="radio3">★</label>
                <input id="radio4" type="radio" name="estrellas1" value="2" disabled="true">
                <label for="radio4">★</label>
                <input id="radio5" type="radio" name="estrellas1" value="1" disabled="true">
                <label for="radio5">★</label>
            </h4>
        </div>
        <div class="col-lg-10">
            <blockquote>
                <p>
                    Buen producto, pero podría ser más grande.
                </p>
            </blockquote>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <h4 class="clasificacion centrar">
                <input id="radio11" type="radio" name="estrellas2" value="5" checked="checked" disabled="true">
                <label for="radio11">★</label>
                <input id="radio12" type="radio" name="estrellas2" value="4" disabled="true">
                <label for="radio12">★</label>
                <input id="radio13" type="radio" name="estrellas2" value="3" disabled="true">
                <label for="radio13">★</label>
                <input id="radio14" type="radio" name="estrellas2" value="2" disabled="true">
                <label for="radio14">★</label>
                <input id="radio15" type="radio" name="estrellas2" value="1" disabled="true">
                <label for="radio15">★</label>
            </h4>
        </div>
        <div class="col-lg-10">
            <blockquote>
                <p>
                    Muy buen producto, excelente calidad.
                </p>
            </blockquote>
        </div>
    </div>

    <h2>Calificá este producto</h2>

    <div class="row">
        <div class="col-lg-2">
            <h4 class="clasificacion centrar">
                <input id="radio21" type="radio" name="estrellas3" value="5">
                <label for="radio21">★</label>
                <input id="radio22" type="radio" name="estrellas3" value="4">
                <label for="radio22">★</label>
                <input id="radio23" type="radio" name="estrellas3" value="3">
                <label for="radio23">★</label>
                <input id="radio24" type="radio" name="estrellas3" value="2">
                <label for="radio24">★</label>
                <input id="radio25" type="radio" name="estrellas3" value="1">
                <label for="radio25">★</label>
            </h4>
        </div>
        <div class="col-lg-10">
            <blockquote>
                <?php echo $this->Form->control('comentario'); ?>
                <?= $this->Form->button('Enviar', ['action' => 'add'], ['class' => 'btn btn-default']); ?>
            </blockquote>
        </div>
    </div>
</div>-->


<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Producto'), ['action' => 'edit', $producto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Producto'), ['action' => 'delete', $producto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $producto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Productos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Producto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rango Edades'), ['controller' => 'RangoEdades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rango Edade'), ['controller' => 'RangoEdades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calificaciones Productos'), ['controller' => 'CalificacionesProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calificaciones Producto'), ['controller' => 'CalificacionesProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Factura Productos'), ['controller' => 'FacturaProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Factura Producto'), ['controller' => 'FacturaProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fotos Productos'), ['controller' => 'FotosProductos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fotos Producto'), ['controller' => 'FotosProductos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reservas'), ['controller' => 'Reservas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserva'), ['controller' => 'Reservas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productos view large-9 medium-8 columns content">
    <h3><?= h($producto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rango Edade') ?></th>
            <td><?= $producto->has('rango_edade') ? $this->Html->link($producto->rango_edade->id, ['controller' => 'RangoEdades', 'action' => 'view', $producto->rango_edade->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $producto->has('categoria') ? $this->Html->link($producto->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $producto->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($producto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Informacion') ?></th>
            <td><?= h($producto->informacion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dimensiones') ?></th>
            <td><?= h($producto->dimensiones) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($producto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($producto->precio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($producto->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($producto->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('active' , ['label' => 'Activo' ]) ?></th>
            <td><?= $producto->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Calificaciones Productos') ?></h4>
        <?php if (!empty($producto->calificaciones_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col"><?= __('Calificacion') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($producto->calificaciones_productos as $calificacionesProductos): ?>
            <tr>
                <td><?= h($calificacionesProductos->id) ?></td>
                <td><?= h($calificacionesProductos->user_id) ?></td>
                <td><?= h($calificacionesProductos->producto_id) ?></td>
                <td><?= h($calificacionesProductos->calificacion) ?></td>
                <td><?= h($calificacionesProductos->created) ?></td>
                <td><?= h($calificacionesProductos->modified) ?></td>
                <td><?= h($calificacionesProductos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CalificacionesProductos', 'action' => 'view', $calificacionesProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CalificacionesProductos', 'action' => 'edit', $calificacionesProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CalificacionesProductos', 'action' => 'delete', $calificacionesProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calificacionesProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Factura Productos') ?></h4>
        <?php if (!empty($producto->factura_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col"><?= __('Factura Id') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($producto->factura_productos as $facturaProductos): ?>
            <tr>
                <td><?= h($facturaProductos->id) ?></td>
                <td><?= h($facturaProductos->producto_id) ?></td>
                <td><?= h($facturaProductos->factura_id) ?></td>
                <td><?= h($facturaProductos->cantidad) ?></td>
                <td><?= h($facturaProductos->precio) ?></td>
                <td><?= h($facturaProductos->created) ?></td>
                <td><?= h($facturaProductos->modified) ?></td>
                <td><?= h($facturaProductos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FacturaProductos', 'action' => 'view', $facturaProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FacturaProductos', 'action' => 'edit', $facturaProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FacturaProductos', 'action' => 'delete', $facturaProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facturaProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fotos Productos') ?></h4>
        <?php if (!empty($producto->fotos_productos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Producto Id') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($producto->fotos_productos as $fotosProductos): ?>
            <tr>
                <td><?= h($fotosProductos->id) ?></td>
                <td><?= h($fotosProductos->producto_id) ?></td>
                <td><?= h($fotosProductos->file) ?></td>
                <td><?= h($fotosProductos->created) ?></td>
                <td><?= h($fotosProductos->modified) ?></td>
                <td><?= h($fotosProductos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FotosProductos', 'action' => 'view', $fotosProductos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FotosProductos', 'action' => 'edit', $fotosProductos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FotosProductos', 'action' => 'delete', $fotosProductos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fotosProductos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reservas') ?></h4>
        <?php if (!empty($producto->reservas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Estado Reserva Id') ?></th>
                <th scope="col"><?= __('Fecha Inicio') ?></th>
                <th scope="col"><?= __('Fecha Fin') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('active' , ['label' => 'Activo' ]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($producto->reservas as $reservas): ?>
            <tr>
                <td><?= h($reservas->id) ?></td>
                <td><?= h($reservas->user_id) ?></td>
                <td><?= h($reservas->estado_reserva_id) ?></td>
                <td><?= h($reservas->fecha_inicio) ?></td>
                <td><?= h($reservas->fecha_fin) ?></td>
                <td><?= h($reservas->created) ?></td>
                <td><?= h($reservas->modified) ?></td>
                <td><?= h($reservas->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reservas', 'action' => 'view', $reservas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reservas', 'action' => 'edit', $reservas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservas', 'action' => 'delete', $reservas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
</div>
