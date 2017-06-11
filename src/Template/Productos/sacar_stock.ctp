<script type="text/javascript">
function ocultarOtros(actual, aOcultar)
{ 
	var estado = document.getElementById(actual).checked;
	//alert(document.getElementById(actual).checked);
	if (estado) {
		$("#"+aOcultar).show();
	}
	else{
		$("#"+aOcultar).hide();	
	}
}
</script>

<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-6 col-lg-offset-3">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend>Descontar del stock actual</legend>                
                <h6 class="tx_gris">Tipo de baja del producto:</h6>
                <div class="radio">
				  <label><input type="radio" name="tipoBaja" id="completa" value="completa" onclick="ocultarOtros('parcial', 'divParcial')" checked>Baja por completo (Se actualiza el stock a 0)</label>
				</div>
				<div class="radio">
				  <label><input type="radio" name="tipoBaja" id="parcial" value="parcial" onclick="ocultarOtros('parcial', 'divParcial')">Baja parcial (Se descuentan productos del stock actual)</label>
				</div>
				<div id="divParcial" style="display: none">					
					<?= $this->Form->control('cantidadADescontar', ['type'=>'number', 'label'=>'Cantidad a descontar']); ?>
					<p>* La cantidad actual es de <?= $producto->cantidad ?> productos.</p>
					<h6 class="tx_gris">Tipo de baja del producto:</h6>
					<div class="radio">
					  <label><input type="radio" name="tiempoBaja" id="indeterminada" value="indeterminada" onclick="ocultarOtros('determinada', 'divDeterminado')" checked>Indeterminado</label>
					</div>
					<div class="radio">
					  <label><input type="radio" name="tiempoBaja" id="determinada" value="determinada" onclick="ocultarOtros('determinada', 'divDeterminado')">Determinado</label>
					</div>
	                <div id="divDeterminado" style="display: none">
	                <?php
	                	$fecha = date('Y-m-d');
	                    $minfecha = strtotime ('+1 day', strtotime ($fecha));
	                    $minfecha = date ('Y-m-d', $minfecha);
	                    $maxfecha = strtotime ('+3 month', strtotime ($fecha));
	                    $maxfecha = date ('Y-m-d', $maxfecha);
	                    echo "<label>Día de finalización de la baja</label>";
	                    echo $this->Form->text('fecha', array('type' => 'date', 'min'=> $minfecha, 'max'=> $maxfecha, 'value'=> $minfecha));
	                ?>
	                </div>
                </div>
            </fieldset>
            <br>
            <?= $this->Form->button(__('Aceptar')) ?>
            <?= $this->Form->end()?>
        </div>
    </div>
</section>