
    <div class="list-group">
        <?= $this->Html->link(h('Mi perfil'), ['action' => 'perfil'], ['class' => 'list-group-item']) ?>
        <?= $this->Html->link(h('Mis reservas'), ['action' => 'reservas'], ['class' => 'list-group-item']) ?>
        <?= $this->Html->link(h('Mis teléfonos'), ['action' => 'telefonos'], ['class' => 'list-group-item']) ?>
        <?= $this->Html->link(h('Mis direcciones'), ['action' => 'direcciones'], ['class' => 'list-group-item']) ?>
        <?= $this->Html->link(h('Mis pagos'), ['action' => 'pagos'], ['class' => 'list-group-item']) ?>
        
	</div>
