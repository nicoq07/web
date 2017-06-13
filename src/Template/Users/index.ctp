<div class="container">
    <br>
    <h3 class="centrar">Usuarios</h3>
   
    <div class="table-responsive">
    <div class = "pull-right">
     <?php 
     //editado por nico
// 	        if (isset($current_user) && $current_user['rol_id'] == ADMINISTRADOR) 
// 	        {
// 	        	echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>'. 'Nuevo'), ['action' => 'add'], ['class' => 'btn btn-default' , 'escape' => false]);
// 	        }
	    ?> 
	     <?php 
        if (isset($current_user) && $current_user['rol_id'] == ADMINISTRADOR) {
            echo "<div class='pull-right'><?= $this->Html->link('<span class='glyphicon glyphicon-plus'></span> Nuevo', ['action' => 'add'], ['class' => 'btn btn-default', 'escape' => false]) ?></div>";
        }
    ?> 
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('apellido') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('rol_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('active' , ['label' => 'Activo' ]) ?></th>
                    <th scope="col" class="actions">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->dni) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->apellido) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->descripcion, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td><?= $user->active ? "Si" : "No"?></td>
                    <td class="actions">
                        <?= $this->Html->link('Modificar', ['action' => 'edit', $user->id], ['class' => 'btn btn-default']) ?>
                        <?php 
                            if ($user->rol_id == CLIENTE) {
                                $this->Html->link('Multar', [ 'controller' => 'multasUser', 'action' => 'add', $user->id], ['class' => 'btn btn-default']);
                            }
                        ?>
                        <?= $this->Form->postLink('Eliminar', ['action' => 'desactivar', $user->id], ['confirm' => '¿Está seguro que desea eliminarlo?', $user->id, 'class' => 'btn btn-default']) ?>
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

