<section class="duplicatable-content bkg">
    <div class="row">   
        <div class="col-lg-8 col-lg-offset-2">
            <?= $this->Form->create($pagosReserva) ?>
            <fieldset>
                <legend>Pago efectivo</legend>
                <div class="row">
                    <div>
                        <?php
                        echo $this->Form->control('user_id', ['label'=>'Usuario']);
                        echo $this->Form->control('reserva_id', ['label'=>'Reserva']);
                        echo $this->Form->control('factura_id', ['label'=>'Factura']);
                        echo $this->Form->control('recibo_id', ['label'=>'Recibo']);
                        echo $this->Form->control('monto', ['label'=>'Monto']);
                        //echo $this->Form->control('user_id', ['options' => $users]);
                        ?>
                    </div>
                </div>
                <br>
                <?= $this->Form->button('Realizar pago', ['class'=>'pull-right']) ?>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>                
</section>