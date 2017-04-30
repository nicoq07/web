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
                                <li><?= $this->Html->link('Contactos',['controller' => 'users', 'action' => 'contacto'])?></li>
                                <li><?= $this->Html->link('Carrito',['controller' => 'reservas', 'action' => 'add'])?></li> 
                                <!--<li><a href="#" onclick="Mostrar('carrito')">CARRITO</a></li>-->
                                <li><?= $this->Html->link('Login',['controller' => 'users', 'action' => 'login'])?></li>
                                <li><?= $this->Html->link('Administrador',['controller' => 'users', 'action' => 'admin'])?></li>
                                <li>
				                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
				                    <ul class="dropdown-menu">
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver productos',['controller' => 'productos', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Agregar',['controller' => 'productos', 'action' => 'add'])?>
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
					                    		  <li>
					                    		 	<?= $this->Html->link('Agregar foto',['controller' => 'fotosProductos', 'action' => 'add'])?>
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
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver roles',['controller' => 'roles', 'action' => 'index'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver reservas',['controller' => 'reservas', 'action' => 'index'])?>
					                    		 </li>
					                    		 <li>
					                    		 	<?= $this->Html->link('Crear',['controller' => 'reservas', 'action' => 'add'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= h('Envíos') ?><b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Contactos',['controller' => 'users', 'action' => 'contacto'])?>
					                    		 </li>
				                    		 </ul>
				                    	</li>
				                    	<li class="dropdown-submenu">
				                    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos <b class="caret"></b></a>
				                    		 <ul class="dropdown-menu">
					                    		 <li>
					                    		 	<?= $this->Html->link('Ver todos',['controller' => 'pagosReserva', 'action' => 'index'])?>
					                    		 </li>
					                    		  <li>
					                    		 	<?= $this->Html->link('Nuevo',['controller' => 'pagosReserva', 'action' => 'add'])?>
					                    		 </li>
					                    		 
				                    		 </ul>
				                    	</li>
				                    </ul>
				                    
				                </li>
                            </ul>							
						</div>
					</div>
					
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
					
                </div>
        </nav>
</div>