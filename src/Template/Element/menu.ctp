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
                            </ul>							
						</div>
					</div>
					
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
					
                </div>
        </nav>
</div>