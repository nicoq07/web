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
    <?php if ($usoProdu == 1){ ?>
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
    <?php } ?>
</div>


</div>
