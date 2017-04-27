<div class="nav-container">
			<nav class="top-bar simple-bar">
				<div class="container-fluid">					
				
					<div class="row nav-menu">

						<div class="col-lg-1 columns">							
				 			<?= $this->Html->image('logo-dark.png', ['class' => 'logo logo-dark' , 'alt' => 'Logo']); ?>
						</div>
					
						<div class="col-lg-11 columns text-right">
							<ul class="menu">
								<li><a href="index.html">HOME</a></li>                                
								<li class="has-dropdown"><a href="#">INFLABLES</a>       
									<ul class="subnav">
										<li><a href="#" onclick="Mostrar('inflablesChicos')"> - Chicos y Medianos</a></li>
										<li><a href="#" onclick="Mostrar('inflablesGrandes')">- Grandes</a></li>
										<li><a href="#" onclick="Mostrar('inflablesExtragrandes')">- Extragrandes</a></li>
										<li><a href="#" onclick="Mostrar('acuaticos')">- Acuáticos</a></li>
								    </ul>
								</li>
                                <li><a href="#" onclick="Mostrar('juegos')">JUEGOS</a></li>
                                <li><a href="#" onclick="Mostrar('reservas')">RESERVAS</a></li>
                                <li><a href="#" onclick="Mostrar('envios')">ENVÍOS</a></li>
                                <li><a href="#" onclick="Mostrar('empleados')">EMPLEADOS</a></li>
                                <li><a href="#" onclick="Mostrar('pagos')">PAGOS</a></li>
                                <li><a href="#" onclick="Mostrar('estadisticas')">ESTADÍSTICAS</a></li>
                                <li><a href="#" onclick="Mostrar('contacto')">CONTACTO</a></li>
                                <li><a href="#" onclick="Mostrar('carrito')">CARRITO</a></li>
                                <li><a href="#" onclick="Mostrar('login')">LOGIN</a></li>
                            </ul>							
						</div>
					</div>
					
					<div class="mobile-toggle">
						<i class="icon icon_menu"></i>
					</div>
					
                </div>
        </nav>
</div>