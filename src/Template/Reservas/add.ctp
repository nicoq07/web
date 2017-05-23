<script type="text/javascript">

function ocultarOtraDireccion()
{ 
    var estado = document.getElementById('otradireccion-1').checked;
    //alert(document.getElementById(nombre).checked);
    $("#envio").html("");
    $("#total").html("");
    $("#localidad").val("");
    $("#domicilio").val("");
    if (estado) {
        $("#"+'cargarOtraDireccion').show();
        document.getElementById('domicilio').disabled = true;
    }
    else{
        $("#"+'cargarOtraDireccion').hide();
        document.getElementById('domicilio').disabled = false;
    }
}

function mostrarPrecioEnvio(id, idTipo) {
    verDiv('productos');
    $.get('/web/reservas/actualizarEnvio?id='+id+'&desde='+idTipo, function(d) {
        //alert(d);
        if (d) {
            $("#envio").html("$"+d);
            $("#precioEnvio").val(d);
        }
        else {
            $("#envio").html("");
            $("#precioEnvio").val("");
        }          
    });
    //calcularTotal();
}

function continuarFecha() {
    var inicioEvento = $("#fecha_inicio").val() + " " + $("#hora_inicio").val();
    var finEvento = $("#fecha_fin").val() + " " + $("#hora_fin").val();
    $.get('/web/reservas/calcularHoras?inicio='+inicioEvento+'&fin='+finEvento, function(d) {
        //alert(d);
        $("#diferenciaHoras").val(d);
    });
    verDiv('lugar');
}

function continuarDomicilio() {
    var estado = document.getElementById('otradireccion-1').checked;
    //alert(estado);
    var total, id, idTipo;
    if (estado) {
        id = $("#localidad").val();
        idTipo = 'localidad';        
    }
    else {
        id = $("#domicilio").val();
        idTipo = 'domicilio';
    }
    if (!id) {
        alert('Debe cargar un domicilio para continuar.');
        return;
    }
    mostrarPrecioEnvio(id, idTipo);
}

function calcularTotal(total) {    
    verDiv('totales');
    var eventoI = $("#fecha_inicio").val() + " " + $("#hora_inicio").val();
    var eventoF = $("#fecha_fin").val() + " " + $("#hora_fin").val();
    var domicilio = $("#domicilio option:selected").val();
    if (!domicilio) {
        domicilio = $("#direccion").val() + " " + $("#numero").val() + " " + $("#piso").val() + " " + $("#localidad option:selected").html();
    }
    else {
        domicilio = $("#domicilio option:selected").html();
    }    
    total = parseInt(total);
    var envio = parseInt($("#precioEnvio").val());
    var totalReserva = total + envio;
    $("#total").html("$"+totalReserva);
    $("#eventoInicio").html(eventoI);
    $("#eventoFin").html(eventoF);
    $("#eventoDireccion").html(domicilio);
}

function verDiv(ver) {
    if (ver== 'fecha') {
        $("#"+'fechaEvento').show();
        $("#"+'lugarEvento').hide();        
        $("#"+'productosEvento').hide();
        $("#"+'totales').hide();
        return;
    }
    if (ver== 'lugar') {
        $("#"+'fechaEvento').hide();
        $("#"+'lugarEvento').show();        
        $("#"+'productosEvento').hide();
        $("#"+'totales').hide();
        return;
    }
    if (ver== 'productos') {
        $("#"+'fechaEvento').hide();
        $("#"+'lugarEvento').hide();        
        $("#"+'productosEvento').show();
        $("#"+'totales').hide();
        return;
    }
    if (ver== 'totales') {
        $("#"+'fechaEvento').hide();
        $("#"+'lugarEvento').hide();        
        $("#"+'productosEvento').hide();
        $("#"+'totales').show();
        return;
    }
}

function actualizarTabla(botones, donde) {
    //alert(botones+" "+donde);
    var diferenciaHoras= $("#diferenciaHoras").val();
    //alert(diferenciaHoras);
    $.get('/web/reservas/actualizarTabla?horas='+diferenciaHoras+'&botones='+botones, function(d) {
        //alert(d);
        $("#"+donde).html(d);
    });
}

</script>

<?php 
    use Cake\Network\Session\DatabaseSession;
    $session = $this->request->session();
    $totalReserva = 0;
?>

<section class="duplicatable-content bkg">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($reserva) ?>            
            <fieldset>
                <legend>Fecha del evento</legend>
                <div class="row" id="fechaEvento">
                    <div class="col-lg-6">
                    <?php
                        //echo $this->Form->control('user_id', ['options' => $users, 'label' => 'Usuario']);
                        //echo $this->Form->control('estado_reserva_id', ['options' => $estadosReservas, 'label' => 'Estado']);
                        echo $this->Form->label('Inicio del evento');
                    ?>
                    <br>
                    <?php
                        $arrayHorarios = [
                            '09:00'=> '09:00',
                            '10:00'=> '10:00',
                            '11:00'=> '11:00',
                            '12:00'=> '12:00',
                            '13:00'=> '13:00',
                            '14:00'=> '14:00',
                            '15:00'=> '15:00',
                            '16:00'=> '16:00',
                            '17:00'=> '17:00',
                            '18:00'=> '18:00',
                            '19:00'=> '19:00',
                            '20:00'=> '20:00',
                            '21:00'=> '21:00',
                            '22:00'=> '22:00',
                        ];

                        echo $this->Form->label('Fecha');
                        echo $this->Form->text('fecha_inicio', array('id'=>'fecha_inicio', 'type' => 'date'));
                        echo $this->Form->label('Horario');
                        echo $this->Form->select('hora_inicio', $arrayHorarios, ['id' => 'hora_inicio']);
                    ?>
                    </div>
                    <div class="col-lg-6">
                    <?php echo $this->Form->label('Fin del evento'); ?>
                    <br>
                    <?php
                        echo $this->Form->label('Fecha');
                        echo $this->Form->text('fecha_fin', array('id'=>'fecha_fin', 'type' => 'date'));
                        echo $this->Form->label('Horario');
                        echo $this->Form->select('hora_fin', $arrayHorarios, ['id' => 'hora_fin']);
                        //echo $this->Form->control('fecha_fin', ['empty' => true]);
                        //echo $this->Form->control('active' , ['label' => 'Activo' ]);
                        //echo $this->Form->control('productos._ids', ['options' => $productos]);
                    ?>
                    </div>

                    <div class="pull-right"><br><?= $this->Form->button('Continuar', ['onclick'=>"continuarFecha()", 'class' => 'btn btn-default', 'type'=>'button']) ?><br> </div>
                </div>
            </fieldset>            
            <fieldset>
                <div>
                    <legend>Lugar del evento</legend>
                    <div class="row" id="lugarEvento" style="display: none">
                        <?php
                            $arrayDomicilios = array();
                            foreach ($domicilios as $domicilio) {
                                $localidad;
                                foreach ($localidades as $localidade) {
                                    if ($localidade->id == $domicilio->localidad_id) {
                                        $arrayDomicilios[$domicilio->id] = $domicilio->presentacion." ".$localidade->descripcion;
                                    }
                                }
                            }

                            echo $this->Form->control('domicilio', ['options' => $arrayDomicilios, 'empty' => 'Seleccione dirección...']);
                        ?>
                        <?php
                            //echo $this->Form->control('domicilio_id', ['options' => $domicilios]);
                        ?>
                        <?php echo $this->Form->input('otraDireccion', array('onclick'=>"ocultarOtraDireccion()", 'label'=>false, 'type'=>'select', 'multiple'=>'checkbox', 'options'=>array(1=>'Otra dirección')));
                         ?>                     
                     <div id="cargarOtraDireccion" style="display: none">
                    <div class="col-lg-5">
                        <?php echo $this->Form->control('direccion', ['label' => 'Calle']); ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $this->Form->control('numero', ['label' => 'Número']); ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $this->Form->control('piso', ['label' => 'Piso']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php
                            $arrayLocalidades = array();
                            foreach ($localidades as $localidade) {
                                $arrayLocalidades[$localidade->id] = $localidade->descripcion;
                            }

                            echo $this->Form->control('localidad', ['options' => $arrayLocalidades, 'empty' => 'Seleccione una localidad...']);
                        ?>
                    </div>
                </div>
                <div class="pull-right"><?= $this->Form->button('Volver', ['onclick'=>"verDiv('fecha')", 'class' => 'btn btn-default', 'type'=>'button']) ?><?= $this->Form->button('Continuar', ['onclick'=>"continuarDomicilio(); actualizarTabla(true, 'tablaProductos')", 'class' => 'btn btn-default', 'type'=>'button']) ?> </div>            
                </div>
                </div>             
            </fieldset>
            <fieldset>
                <div>
                    <legend>Productos seleccionados</legend>
                    <div class="row" id="productosEvento" style="display: none">
                        <input type="hidden" id="precioEnvio">
                        <input type="hidden" id="diferenciaHoras">
                        <div id="tablaProductos"></div> <!--Acá se va a cargar dinámicamente la tabla-->
                        <!--<table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cantidad</th>
                                    <th>Descripción</th>
                                    <th>Precio p/hora</th>
                                    <th>Cantidad de horas</th>
                                    <th>Precio Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productos as $producto): ?>
                                    <tr>
                                        <td><?= $producto->id ?></td>
                                        <td><?= $producto->cantidad ?></td>
                                        <td><?= $producto->descripcion ?></td>
                                        <td><?= $producto->precio ?></td>
                                        <td><?= $session->read('horas'); ?></td>
                                        <td><?php 
                                            $totalProducto = $session->read('horas') * $producto->precio;
                                            $totalReserva= $totalReserva + $totalProducto;
                                            echo $totalProducto; ?></td>
                                        <td><button class="btn btn-default"> X </button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>-->
                        <div class="pull-right"><?= $this->Form->button('Volver', ['id' => 'volver', 'onclick'=>"verDiv('lugar')", 'class' => 'btn btn-default', 'type'=>'button']) ?><?= $this->Form->button('Continuar', ['id' => 'continuar', 'onclick'=>"calcularTotal($totalReserva); actualizarTabla(false, 'tablaDetalleProductos')", 'class' => 'btn btn-default', 'type'=>'button']) ?> </div>            
                        </div>
                    </div>
                    <div>
                        <legend>Detalle Reserva</legend>
                        <div class="row" id="totales" style="display: none">
                            <h4><strong>Inicio del evento: </strong></h4><h6 id="eventoInicio" class="tx_gris"></h6><br>
                            <h4><strong>Finalización del evento: </strong></h4><h6 id="eventoFin" class="tx_gris"></h6><br>
                            <h4><strong>Dirección: </strong></h4><h6 id="eventoDireccion" class="tx_gris"></h6><br>
                            <div id="tablaDetalleProductos"></div> <!--Acá se va a cargar dinámicamente la tabla-->
                            <!--<table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Cantidad</th>
                                        <th>Descripción</th>
                                        <th>Precio p/hora</th>
                                        <th>Cantidad de horas</th>
                                        <th>Precio Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                        <tr>
                                            <td><?= $producto->id ?></td>
                                            <td><?= $producto->cantidad ?></td>
                                            <td><?= $producto->descripcion ?></td>
                                            <td><?= $producto->precio ?></td>
                                            <td><?= $session->read('horas'); ?></td>
                                            <td><?php 
                                                $totalProducto = $session->read('horas') * $producto->precio;
                                                $totalReserva= $totalReserva + $totalProducto;
                                                echo $totalProducto; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>-->
                            <h4><strong>Costo de envío:</strong></h4><h6 id='envio' class="tx_gris"></h6><br>
                            <div class="row">
                                <div class="col-lg-2 col-lg-offset-5 well rojo centrar standard-radius">
                                    <h4 class="text-white"><strong>Total a pagar:</strong></h4>
                                    <h4 id="total" class="text-white"></h4>
                                </div>
                            </div>
                            <div class="pull-right"><?= $this->Form->button('Volver', ['onclick'=>"verDiv('productos')", 'class' => 'btn btn-default', 'type'=>'button']) ?><?= $this->Form->button('Reservar') ?> </div>
                        </div>
                    </div>
                </div>           
            </fieldset>            
            <br>            
            <?= $this->Form->end() ?>
        </div>
    </div>
</section>

<!--<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Reservas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estados Reservas'), ['controller' => 'EstadosReservas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estados Reserva'), ['controller' => 'EstadosReservas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Envios'), ['controller' => 'Envios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Envio'), ['controller' => 'Envios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facturas'), ['controller' => 'Facturas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Factura'), ['controller' => 'Facturas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pagos Reserva'), ['controller' => 'PagosReserva', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Productos'), ['controller' => 'Productos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Producto'), ['controller' => 'Productos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="reservas form large-9 medium-8 columns content">
    <?= $this->Form->create($reserva) ?>
    <fieldset>
        <legend><?= __('Add Reserva') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('estado_reserva_id', ['options' => $estadosReservas]);
            echo $this->Form->control('fecha_inicio', ['empty' => true]);
            echo $this->Form->control('fecha_fin', ['empty' => true]);
            echo $this->Form->control('active' , ['label' => 'Activo' ]);
            echo $this->Form->control('productos._ids', ['options' => $productos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
