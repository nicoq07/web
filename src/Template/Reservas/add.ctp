<script type="text/javascript">

function mostrarPrecioEnvio(id) {
    verDiv('productos');
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
            $("#precioEnvio").val(texto[0]*cantidadEnvios);
            $("#tiempoEnvio").val(texto[2]);
        }
        else {
            $("#envio").html("");
            $("#precioEnvio").val("");
            $("#tiempoEnvio").val("");
        }          
    });
}

function continuarFecha() {
    var inicioEvento = $("#fecha_inicio").val() + " " + $("#hora_inicio").val();
    var finEvento = $("#fecha_fin").val() + " " + $("#hora_fin").val();
    $.get('/web/reservas/calcularHoras?fIni='+$("#fecha_inicio").val()+'&hIni='+$("#hora_inicio").val()+'&fFin='+$("#fecha_fin").val()+'&hFin='+$("#hora_fin").val(), function(d) {
        $("#diferenciaHoras").val(d);
    });
    verDiv('lugar');
}

function continuarDomicilio() {
    var id;
    id = $("#domicilio").val();
    mostrarPrecioEnvio(id);
}

function continuarProductos() {    
    verDiv('totales');
    var eventoI = $("#fecha_inicio").val() + " " + $("#hora_inicio").val() + ":00";
    var eventoF = $("#fecha_fin").val() + " " + $("#hora_fin").val() + ":00";
    var domicilio = $("#domicilio option:selected").html();
    var total = parseInt($("#calculoTotal").val());
    var envio = parseInt($("#precioEnvio").val());
    var totalReserva = total + envio;
    if (totalReserva >= 2000) {        
        totalReserva = totalReserva*.85;
        $("#descuento").show();
    }
    else {
        $("#descuento").hide();  
    }
    
    $("#total").html("$"+parseFloat(totalReserva).toFixed(2));
    $("#totalReserva").val(totalReserva);
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
    var diferenciaHoras= $("#diferenciaHoras").val();
    $.get('/web/reservas/actualizarTabla?horas='+diferenciaHoras+'&botones='+botones, function(d) {
        var texto = d.split('|');
        $("#"+donde).html(texto[0]);
        $("#calculoTotal").val(texto[1]);
    });
}

function bajaCarro(idCarrito) {
    var idDomicilio = $("#domicilio").val();
    mostrarPrecioEnvio(idDomicilio);
    $.get('/web/reservas/bajaCarro?idCarrito='+idCarrito, function(d) {
        actualizarTabla(true,'tablaProductos');
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
                    ?>
                    </div>

                    <div class="pull-right"><br><?= $this->Form->button('Continuar', ['onclick'=>"continuarFecha()", 'class' => 'btn btn-default', 'type'=>'button']) ?><br> </div>
                </div>
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

                        <?= $this->Html->link('Cargar Dirección', ['controller'=>'domicilios', 'action' => 'add'], ['class' => 'btn btn-default']) ?>
                        <div class="pull-right"><?= $this->Form->button('Volver', ['onclick'=>"verDiv('fecha')", 'class' => 'btn btn-default', 'type'=>'button']) ?><?= $this->Form->button('Continuar', ['onclick'=>"continuarDomicilio(); actualizarTabla(true, 'tablaProductos')", 'class' => 'btn btn-default', 'type'=>'button']) ?> </div>
                    </div>
                    <br>    
                </div>               
                             
                <div>
                    <legend>Productos seleccionados</legend>
                    <div class="row" id="productosEvento" style="display: none">                        
                        <input type="hidden" id="diferenciaHoras" name="diferenciaHoras">                                                
                        <?php echo $this->Form->input( 
                           'user_id', 
                           array ( 
                              'type'=>'hidden', 
                              'value'=> $session->read('Auth.User.id') 
                           ) 
                        ); ?>
                        <div id="tablaProductos"></div> <!--Acá se va a cargar dinámicamente la tabla-->

                        <div class="pull-right"><?= $this->Form->button('Volver', ['id' => 'volver', 'onclick'=>"verDiv('lugar')", 'class' => 'btn btn-default', 'type'=>'button']) ?><?= $this->Form->button('Continuar', ['id' => 'continuar', 'onclick'=>"continuarProductos(); actualizarTabla(false, 'tablaDetalleProductos')", 'class' => 'btn btn-default', 'type'=>'button']) ?> </div>            
                        </div>
                    </div>
                    <div>
                        <legend>Detalle Reserva</legend>
                        <div class="row" id="totales" style="display: none">
                            <input type="hidden" id="precioEnvio" name="precioEnvio">
                            <input type="hidden" id="tiempoEnvio" name="tiempoEnvio">
                            <input type="hidden" id="totalReserva" name="totalReserva">
                            <input type="hidden" id="calculoTotal" name="calculoTotal">
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
