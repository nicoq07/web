<script type="text/javascript">

function mostrarPrecioEnvio(id) {
    $.get('/web/reservas/actualizarEnvio?id='+id, function(d) {        
        if (d) {
            var texto = d.split('|');
            var cantidadEnvios = 0;
            if (texto[1]%4 == 0) {
                cantidadEnvios = texto[1]/4;
            } else {
                cantidadEnvios = Math.floor((texto[1]/4)+1)
            }
            $("#envio").html("$"+(texto[0]*cantidadEnvios));
            $("#tiempoEnvio").val(texto[4]);
        }
        else {
            $("#envio").html("");
            $("#tiempoEnvio").val("");
        }          
    });
}

function validarFecha() {
    var fechaInicio = $("#fecha_inicio").val();
    var fechaFin = $("#fecha_fin").val();
    var horaInicio = parseInt($("#hora_inicio").val());
    var horaFin = parseInt($("#hora_fin").val());
    var inicioMin = document.getElementById("fecha_inicio").min;
    var inicioMax = document.getElementById("fecha_inicio").max;
    var finMin = document.getElementById("fecha_fin").min;
    var finMax = document.getElementById("fecha_fin").max;

    //Valido que las fechas estén en el rango posible de fechas.
    if (fechaInicio < inicioMin || fechaInicio > inicioMax) {
        alert("La fecha de inicio es incorrecta. Por favor intente nuevamente");
        return false;
    }

    if (fechaFin < finMin || fechaFin > finMax) {
        alert("La fecha de finalización es incorrecta. Por favor intente nuevamente");
        return false;
    }

    if (fechaInicio == fechaFin) {
        if (horaInicio >= horaFin) {
            alert("La finalización del evento debe ser posterior a su inicio.");
            return false;
        }
    } else {
        if (fechaInicio > fechaFin) {
            alert("La finalización del evento debe ser posterior a su inicio.");
            return false;
        }
    }

    return true;
}

function validarDomicilio() {
    var id;
    id = $("#domicilio").val();
    if (id != 0) {
        mostrarPrecioEnvio(id);
    } else {
        alert("Debe seleccionar una dirección para continuar.");
        return false;
    }
    return true;
}

function validarProductos() {
    var cant = $('#cantProductos').val();
    if (cant == 0) {
        alert("Debe cargar el carrito para continuar.")
        return false;
    }
    return true;
}

function validarPago(){
    var tarjetaId = document.getElementById("tarjeta-id").value;
    var medioPagoId = document.getElementById("medio-pago-id").value;
    var monto = document.getElementById("monto").value;
    
    if (monto == "0") {
        alert("Debe seleccionar un monto a pagar para continuar.")
        return false;
    }
    if (medioPagoId == "") {
        alert("Debe seleccionar un medio de pago para continuar.");
        return false;
    }
    if (tarjetaId == 0) {
        alert("Debe seleccionar una tarjeta para continuar.")
        return false;
    }
    return true;
}

function btnContinuar() {    
    verDiv('detalle');
    actualizarTabla();
    var fechaInicio = $("#fecha_inicio").val();
    fechaInicio = fechaInicio.split("-");
    var eventoI = fechaInicio[2] + "/" + fechaInicio[1] + "/" + fechaInicio[0] + " " + $("#hora_inicio").val() + ":00 hs.";
    var fechaFin = $("#fecha_fin").val();
    fechaFin = fechaFin.split("-");
    var eventoF = fechaFin[2] + "/" + fechaFin[1] + "/" + fechaFin[0] + " " + $("#hora_fin").val() + ":00 hs.";
    var domicilio = $("#domicilio option:selected").html();
    $("#eventoInicio").html(eventoI);
    $("#eventoFin").html(eventoF);
    $("#eventoDireccion").html(domicilio);
}

function verDiv(ver) {
    if (ver== 'evento') {
        $("#"+'fechaEvento').show();
        $("#"+'lugarEvento').show();        
        $("#"+'productosEvento').show();
        $("#"+'totales').hide();
        $("#"+'pago').hide();
        return;
    }
    if (ver== 'detalle') {
        $("#"+'fechaEvento').hide();
        $("#"+'lugarEvento').hide();        
        $("#"+'productosEvento').hide();
        $("#"+'totales').show();
        $("#"+'pago').hide();
        return;
    }
    if (ver== 'pago') {
        $("#"+'fechaEvento').hide();
        $("#"+'lugarEvento').hide();        
        $("#"+'productosEvento').hide();
        $("#"+'totales').hide();
        $("#"+'pago').show();
        return;
    }
}

function actualizarTabla() {
    var fIni = $("#fecha_inicio").val();
    var hIni = $("#hora_inicio").val();
    var fFin = $("#fecha_fin").val();
    var hFin = $("#hora_fin").val();
    var idDomicilio = $("#domicilio").val();
    //alert(idDomicilio);
    $.get('/web/reservas/actualizarTabla?fIni='+fIni+'&hIni='+hIni+'&fFin='+fFin+'&hFin='+hFin+'&idDom='+idDomicilio, function(d) {
        //alert(d);
        var texto = d.split('|');
        $("#tablaDetalleProductos").html(texto[0]);

        var total = parseInt(texto[1]);
        var precioEnvio = parseInt(texto[2]);
        //alert(envio);

        var cantidadEnvios = 0;
        if (texto[3]%4 == 0) {
            cantidadEnvios = texto[3]/4;
        } else {
            cantidadEnvios = Math.floor((texto[3]/4)+1)
        }
        var totalEnvio = texto[2]*cantidadEnvios;
        $("#envio").html("$"+totalEnvio);
        $("#tiempoEnvio").val(texto[4]);

        var totalReserva = total + totalEnvio;
        if (totalReserva >= 2000) {        
            totalReserva = totalReserva*.85;
            $("#descuento").show();
        }
        else {
            $("#descuento").hide();  
        }
        
        $("#total").html("$"+parseFloat(totalReserva).toFixed(2));
        $("#totalReserva").val(totalReserva);        
    });
}

function bajaCarro(idCarrito) {
    /*var idDomicilio = $("#domicilio").val();
    mostrarPrecioEnvio(idDomicilio);*/
    $.get('/web/reservas/bajaCarro?idCarrito='+idCarrito, function(d) {
        $('#cantProductos').val(d);
        actualizarTablaProductos();
    });
}

function actualizarTablaProductos() {
    $.get('/web/reservas/actualizarTablaProductos', function(d) {
        $("#productosEvento").html(d);
    });
}

function actualizarFechaFin(){
    //alert($("#fecha_inicio").val());
    var fechaInicio = $("#fecha_inicio").val();
    $("#fecha_fin").val(fechaInicio);
    document.getElementById("fecha_fin").min = fechaInicio;
}

function cargarMonto(){
    var totalReserva = $("#totalReserva").val();
    //alert(totalReserva);
    $('#monto').empty();
    $('#monto').append(new Option('Seleccione % a pagar', '0', true, true));
    $('#monto').append(new Option('%50 - $'+(totalReserva*.5).toFixed(2), '0.50', true, true));
    $('#monto').append(new Option('%75 - $'+(totalReserva*.75).toFixed(2), '0.75', true, true));
    $('#monto').append(new Option('%100 - $'+parseFloat(totalReserva).toFixed(2), '1', true, true));
    $('#monto').val("0");
}

</script>

<?php 
    use Cake\Network\Session\DatabaseSession;
    $session = $this->request->session();
    $totalReserva = 0;
    $contador = 0;
?>

<section class="duplicatable-content bkg">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <?= $this->Form->create($reserva) ?>            
            <fieldset>
                <input type='hidden' name='cantProductos' id='cantProductos' value="<?= sizeof($productos) ?>">
                <input type="hidden" id="tiempoEnvio" name="tiempoEnvio">
                <input type="hidden" id="diferenciaHoras" name="diferenciaHoras">
                <legend>Productos seleccionados</legend>
                <div class="row" id="productosEvento">
                    <div class="col-lg-10 col-lg-offset-1">                                                
                        <?php echo $this->Form->input( 
                           'user_id', 
                           array ( 
                              'type'=>'hidden', 
                              'value'=> $session->read('Auth.User.id') 
                           ) 
                        ); ?>
                        <div id="tablaProductos">                            
                            <?php if (sizeof($productos) != 0 ): ?>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Cantidad</th>
                                        <th>Descripción</th>
                                        <th>Precio p/hora</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                        <tr>
                                            <td><?= h($producto->id) ?></td>
                                            <td><?= h($cantidad[$contador]) ?></td>
                                            <td><?= h($producto->descripcion) ?></td>
                                            <td><?= h($producto->precio) ?></td>
                                            <td> <input type='button' value='X' class='btn btn-default' onclick='bajaCarro( <?=$producto->id ?>)'/></td>
                                        </tr>
                                        <?php $contador = $contador+1; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif ?>
                        <?php if (sizeof($productos) == 0 ): ?>
                            <div class="centrar">No posee productos en el carrito.</div><br>
                        <?php endif ?>
                        </div> <!--Acá se va a cargar dinámicamente la tabla-->
                    </div>
                </div>

                <legend>Datos del evento</legend>
                <div class="row" id="fechaEvento">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="col-lg-6">
                        <?php
                            echo $this->Form->label('Inicio del evento');
                        ?>
                        <br>
                        <?php
                            $arrayHorarios = [
                                '9'=> '09:00',
                                '10'=> '10:00',
                                '11'=> '11:00',
                                '12'=> '12:00',
                                '13'=> '13:00',
                                '14'=> '14:00',
                                '15'=> '15:00',
                                '16'=> '16:00',
                                '17'=> '17:00',
                                '18'=> '18:00',
                                '19'=> '19:00',
                                '20'=> '20:00',
                                '21'=> '21:00',
                                '22'=> '22:00',
                            ];

                            echo $this->Form->label('Fecha');
                            $fecha = date('Y-m-d');
                            $minfecha = strtotime ('+3 day', strtotime ($fecha));
                            $minfecha = date ('Y-m-d', $minfecha);
                            $maxfecha = strtotime ('+3 month', strtotime ($fecha));
                            $maxfecha = date ('Y-m-d', $maxfecha);

                            echo $this->Form->text('fecha_inicio', array('id'=>'fecha_inicio', 'type' => 'date', 'min'=> $minfecha, 'max'=> $maxfecha, 'value'=> $minfecha, 'onchange'=>'actualizarFechaFin()'));
                            echo $this->Form->label('Horario');
                            echo $this->Form->select('hora_inicio', $arrayHorarios, ['id' => 'hora_inicio']);
                        ?>
                        </div>
                        <div class="col-lg-6">
                        <?php echo $this->Form->label('Fin del evento'); ?>
                        <br>
                        <?php
                            echo $this->Form->label('Fecha');
                            echo $this->Form->text('fecha_fin', array('id'=>'fecha_fin', 'type' => 'date', 'min'=> $minfecha, 'max'=> $maxfecha, 'value'=> $minfecha));
                            echo $this->Form->label('Horario');
                            echo $this->Form->select('hora_fin', $arrayHorarios, ['id' => 'hora_fin']);
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row" id="lugarEvento">
                    <div class="col-lg-10 col-lg-offset-1">
                    <?php
                        $arrayDomicilios = array();
                        foreach ($domicilios as $domicilio) {
                            $localidad;
                            $arrayDomicilios[0] = "Seleccione dirección...";
                            foreach ($localidades as $localidade) {
                                if ($localidade->id == $domicilio->localidad_id) {
                                    $arrayDomicilios[$domicilio->id] = $domicilio->presentacion." ".$localidade->descripcion;
                                }
                            }
                        }

                        if (empty($arrayDomicilios)) {
                            echo $this->Form->control('domicilio', ['options' => [0 => 'Debe cargar un domicilio']]);
                        } else {
                            echo $this->Form->control('domicilio', ['options' => $arrayDomicilios]);
                        }
                    ?>

                    <?= $this->Html->link('Cargar Dirección', ['controller'=>'domicilios', 'action' => 'add'], ['class' => 'btn btn-default']) ?>
                    <div class="pull-right"><?= $this->Form->button('Continuar', ['onclick'=>"javascript: if (validarProductos() && validarFecha() && validarDomicilio()) btnContinuar();" , 'class' => 'btn btn-default', 'type'=>'button']) ?> </div>
                    </div>
                </div>

                <legend>Detalle Reserva</legend>
                <div class="row" id="totales" style="display: none">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h4><strong>Inicio del evento: </strong></h4><h6 id="eventoInicio" class="tx_gris"></h6><br>
                        <h4><strong>Finalización del evento: </strong></h4><h6 id="eventoFin" class="tx_gris"></h6><br>
                        <h4><strong>Dirección: </strong></h4><h6 id="eventoDireccion" class="tx_gris"></h6><br>
                        <div id="tablaDetalleProductos"></div> <!--Acá se va a cargar dinámicamente la tabla-->

                        <p>*El costo de envío puede variar de acuerdo a la cantidad de productos solicitados.</p>
                        <h4><strong>Costo de envío:</strong></h4><h6 id='envio' name='envio' class="tx_gris"></h6>
                        <div id="descuento" style="display: none"><h4><strong>Descuento:</strong></h4><h6 class="tx_gris">%15</h6><br></div>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5 well rojo centrar standard-radius">
                                <h4 class="text-white"><strong>Total a pagar:</strong></h4>
                                <h4 id="total" name="total" class="text-white"></h4>
                            </div>
                        </div>
                        <input type="hidden" name="totalReserva" id="totalReserva">
                        <div class="pull-right"><?= $this->Form->button('Volver', ['onclick'=>"verDiv('evento')", 'class' => 'btn btn-default', 'type'=>'button']) ?><?= $this->Form->button('Reservar', ['onclick'=>"cargarMonto(), verDiv('pago')", 'class' => 'btn btn-default', 'type'=>'button']) ?> </div>
                    </div>
                </div>
                <div>
                    <legend>Pago</legend>
                    <div class="row" id="pago" style="display: none"> 
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="row">
                                <div class="col-lg-4">
                                    <?php 
                                        echo $this->Form->control('monto', ['options' => array()]);
                                     ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php echo $this->Form->control('medio_pago_id', ['options' => $mediosPagos, 'empty' => 'Elija un medio de pago']); ?>
                                </div>
                                <div class="col-lg-4">
                                    <?php
                                    $cont = 0;
                                    foreach ($tarjetas as $tarjeta) {
                                        $cont ++;
                                    }
                                     
                                    if ($cont == 0) {
                                        echo $this->Form->control('tarjeta_id', ['options' => [0 => 'Debe cargar una tarjeta']]);
                                    } else {
                                        echo $this->Form->control('tarjeta_id', ['options' => $tarjetas]);
                                    }                      
                                    echo $this->Html->link('Otra Tarjeta', ['controller'=>'tarjetasCreditoUser', 'action' => 'add', $current_user['id']], ['class' => 'btn btn-default']);
                                    ?>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-10 col-lg-offset-1">
                            <legend>Datos de la tarjeta</legend>
                                <div class="bg-white" style='padding: 20px;'>
                                <?php
                                    echo $this->Form->label('Fecha de vencimiento');
                                ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <?php
                                            echo $this->Form->input('vencimientoMes', ['type'=>'number', 'placeholder'=>'MM', 'label'=>false, 'max'=>12, 'min'=>1]);
                                        ?>
                                        </div>
                                        <div class="col-lg-6">
                                        <?php
                                            echo $this->Form->input('vencimientoAnio', ['type'=>'number', 'placeholder'=>'AAAA', 'label'=>false, 'max'=>2099, 'min'=>2017]);
                                        ?>
                                        </div>
                                    </div>
                                <?php
                                    echo $this->Form->input('codSeguridad', ['type'=>'number', 'placeholder'=>'XXX', 'max'=>999, 'min'=>0]);
                                ?>                        
                                </div>
                                <br>
                                <?= $this->Form->button('Realizar pago', ['class'=>'pull-right', 'onClick'=>"return validarPago();"]) ?><?= $this->Form->button('Volver', ['onclick'=>"verDiv('detalle')", 'class' => 'pull-right', 'type'=>'button']) ?>
                            </div>
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
