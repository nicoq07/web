<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend>Agregar al stock actual</legend>
                <h5 class="tx_gris">La cantidad actual es de <?= $producto->cantidad ?> productos.</h5>
                <?php
                    echo $this->Form->control('stock', ['type'=>'number', 'label'=>'Cantidad a agregar']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Agregar')) ?>
            <?= $this->Form->end()?>
        </div>
    </div>
</section>