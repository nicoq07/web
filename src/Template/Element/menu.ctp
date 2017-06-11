<div class="nav-container">
			<nav class="top-bar simple-bar">
				<div class="container-fluid">					
				
					<div class="row nav-menu">

						<div class="col-lg-2 columns">							
				 			<?= $this->Html->image('logo-dark.png', ['class' => 'logo logo-dark' , 'alt' => 'Logo']); ?>
						</div>
					
						<div class="col-lg-10 columns text-center">
							<ul class="menu">
								<li><?= $this->Html->link('Home',['controller' => 'productos', 'action' => 'home'])?></li>                                
								<li><?= $this->Html->link('Productos',['controller' => 'productos', 'action' => 'index'])?></li>
								
								
                                <!--<li><a href="#" onclick="Mostrar('juegos')">JUEGOS</a></li>-->
                                <li><?= $this->Html->link('Reservas',['controller' => 'reservas', 'action' => 'index'])?></li>
                               <!--   <li><a href="#" onclick="Mostrar('envios')">ENVIOS</a></li>
                               <li><a href="#" onclick="Mostrar('empleados')">EMPLEADOS</a></li>
                                <li><a href="#" onclick="Mostrar('pagos')">PAGOS</a></li>
                                <li><a href="#" onclick="Mostrar('estadisticas')">ESTADISTICAS</a></li>-->
                                <li><?= $this->Html->link('Contacto',['controller' => 'contact', 'action' => 'index'])?></li>
                                <li><?= $this->Html->link('Carrito',['controller' => 'reservas', 'action' => 'add'])?></li> 
                                <!--<li><a href="#" onclick="Mostrar('carrito')">CARRITO</a></li>-->
                                <?php if (empty($current_user)) : ?>
                                <li><?= $this->Html->link('Ingresar',['controller' => 'users', 'action' => 'login'])?></li>                               
                                <?php endif;?>

                                <?php if (!empty($current_user)) : ?>
                                <li>
				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo h($current_user['nombre'])?>  <b class="caret"></b></a>
				                    <ul class="dropdown-menu">
				                    	<li class="dropdown-submenu">
				                    	<?php if (!empty($current_user) && $current_user['rol_id'] == ADMINISTRADOR ) : ?>
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver productos',['controller' => 'productos', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Agregar productos',['controller' => 'productos', 'action' => 'add'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('ver caterogías',['controller' => 'categorias', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Nueva caterogía',['controller' => 'categorias', 'action' => 'add'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver rangos edad',['controller' => 'rangoEdades', 'action' => 'index'])?>
					                    		 </li>
					                    		  <li>
					                    		 	<?= $this->Html->link('Agregar rango edad',['controller' => 'rangoEdades', 'action' => 'add'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Agregar nuevo',['controller' => 'users', 'action' => 'add'])?>
					                    		 </li>
					                    		  <li>
					                    		 	<?= $this->Html->link('Ver todos',['controller' => 'users', 'action' => 'index'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver reservas',['controller' => 'reservas', 'action' => 'index'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= h('Envíos') ?><b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver todos',['controller' => 'envios', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Agregar localidad',['controller' => 'localidades', 'action' => 'add'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		  <li>
					                    		 	<?= $this->Html->link('Nuevo pago en efectivo',['controller' => 'pagosEfectivo', 'action' => 'add'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver pagos en efectivo',['controller' => 'pagosEfectivo', 'action' => 'index'])?>
					                    		 </li>					                    		 
				                    		 </ul>
				                    	</li>
				                    	<?php endif; ?>

				                    	<?php if (!empty($current_user) && $current_user['rol_id'] == EMPLEADO ) : ?>
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver productos',['controller' => 'productos', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Agregar productos',['controller' => 'productos', 'action' => 'add'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('ver caterogías',['controller' => 'categorias', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Nueva caterogía',['controller' => 'categorias', 'action' => 'add'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver rangos edad',['controller' => 'rangoEdades', 'action' => 'index'])?>
					                    		 </li>
					                    		  <li>
					                    		 	<?= $this->Html->link('Agregar rango edad',['controller' => 'rangoEdades', 'action' => 'add'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		  <li>
					                    		 	<?= $this->Html->link('Ver todos',['controller' => 'users', 'action' => 'index'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver reservas',['controller' => 'reservas', 'action' => 'index'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= h('Envíos') ?><b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver todos',['controller' => 'envios', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Agregar localidad',['controller' => 'localidades', 'action' => 'add'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		  <li>
					                    		 	<?= $this->Html->link('Nuevo pago en efectivo',['controller' => 'pagosEfectivo', 'action' => 'add'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver pagos en efectivo',['controller' => 'pagosEfectivo', 'action' => 'index'])?>
					                    		 </li>					                    		 
				                    		 </ul>
				                    	</li>
				                    	<?php endif; ?>

				                    	<?php if (!empty($current_user) && $current_user['rol_id'] == BLOQUEADO ) : ?>
				                    			 <li>
					                    		 	<?= $this->Html->link('Ver multas',['controller' => 'MultasUser', 'action' => 'index'])?>
					                    		 </li>					                    		 
				                    	<?php endif; ?>

				                    	<?php if (!empty($current_user) && ($current_user['rol_id'] != ADMINISTRADOR && $current_user['rol_id'] != EMPLEADO)) :?>
				                    	<li>
					                    	<?= $this->Html->link('Perfil',['controller' => 'users', 'action' => 'perfil'])?>
					                    </li>
				                    	<?php endif; ?>
				                    	
				                    	<li><?= $this->Html->link('Salir',['controller' => 'users', 'action' => 'logout'])?></li>
				                    </ul>
				                    
				                </li>
				               <?php endif;	?>
                            </ul>							
						</div>
					</div>
					
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
					
                </div>
        </nav>
</div>