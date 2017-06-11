&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
	<div class="col-lg-7">
		<div class="well">
		<h3 align="right"><?= $this->Html->link(__('Nueva'), ['controller' =>'tarjetasCreditoUser', 'action' => 'add',$user->id], ['class' => 'btn btn-default ']) ?>
</h3>
			<h3><?= h("Mis Tarjetas") ?></h3>
			    <table class ="table table-striped table-hover"  >
			        <thead>
			            <tr>
			                <th scope="col"><?= $this->Paginator->sort('marca') ?></th>
			                <th scope="col"><?= $this->Paginator->sort('numero')?></th>
			                <th scope="col" class="actions"><?= __('Acciones') ?></th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php foreach ($user->tarjetas_credito_user as $card): ?>
			            <tr>
			             <td> <?php echo h($card->marca)?>	</td>
			             <td> <?php echo h($card->num)?>	</td>
			             <td class="actions">
			                    <?= $this->Form->postLink(__('Borrar'), ['controller' =>'tarjetasCreditoUser','action' => 'desactivar', $card->id], ['confirm' => __("Seguro de borrar la tajera $card->num ?")]) ?>
			                </td>
			            </tr>
			            <?php endforeach; ?>
			        </tbody>
		   		</table>
	    </div>
	    
	</div>
	
	
</div>
<section class="duplicatable-content bkg">
	<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h5>&nbsp;</h5>
				<h6>&nbsp;</h6>
</section>