<div class="container">
    <br>
    <h3 class="centrar">Rango de edades</h3>
    <div class="pull-right"><?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?></div>
    <div class="table-responsive">
        <table class="table table-striped" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('rango') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active' , ['label' => 'Activo' ]) ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rangoEdades as $rangoEdade): ?>
                <tr>
                    <td><?= $this->Number->format($rangoEdade->id) ?></td>
                    <td><?= h($rangoEdade->rango) ?></td>
                    <td><?= $rangoEdade->active ? "Si" : "No"?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $rangoEdade->id], ['class' => 'btn btn-default']) ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'desactivar', $rangoEdade->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $rangoEdade->id, 'class' => 'btn btn-default']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator centrar">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . 'Primera') ?>
            <?= $this->Paginator->prev('< ' . 'Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Siguiente' . ' >') ?>
            <?= $this->Paginator->last('Última' . ' >>') ?>
        </ul>
    </div>
</div>

