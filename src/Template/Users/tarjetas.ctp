&nbsp;
<div class="row"> 
	<div class="col-lg-3">
		<?= $this->element('menuLateral') ?>
	</div>
	<div class="col-lg-7">
		<div class="well">
			<h3><?= h("Mis Tarjetas") ?></h3>
			    <table class ="table table-striped table-hover"  >
			        <thead>
			            <tr>
			                <th scope="col"><?= $this->Paginator->sort('marca') ?></th>
			                <th scope="col"><?= h('numero') ?></th>
			                <th scope="col" class="actions"><?= __('Actions') ?></th>
			            </tr>
			        </thead>
			        <tbody>
			            <?php foreach ($user->tarjetas_credito_user as $card): ?>
			            <tr>
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