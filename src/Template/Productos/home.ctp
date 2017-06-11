 <div class="social">
			<ul>
				<li><a href="https://www.facebook.com/" target="_blank" class="icon-facebook"></a></li>
				<li><a href="https://twitter.com/" target="_blank" class="icon-twitter"></a></li>
				<li><a href="https://www.instagram.com/" target="_blank" class="icon-instagram"></a></li>
			</ul>
</div>    
<span class="background-image-holder parallax-background"></span>
<section class="hero-slider">
					<ul class="slides">
						<li class="overlay">
							<div class="background-image-holder parallax-background">
								<img class="background-image" alt="Background Image" src="img/s1.jpg">
							</div>
							<div class="container align-vertical">
							  <div class="row">
							    <div class="col-lg-12 margin">
							      <h1 class="text-white">Fun Club</br>
							        Juegos para eventos</h1>
							      <?= $this->Html->link('Nuestros juegos',['controller' => 'productos', 'action' => 'index'],['class' => 'btn btn-primary btn-white'])?>
							      <?= $this->Html->link('Contacto',['controller' => 'contact', 'action' => 'index'],['class' => 'btn btn-primary btn-filled'])?>
							      <!--<a target="_blank" href="" class="btn btn-primary btn-white">Nuestros juegos</a> <a href=".php" class="btn btn-primary btn-filled">Contacto</a>-->
							  	</div>
						      </div>
						  	</div>
						</li>                    
						<li class="overlay">
							<div class="background-image-holder parallax-background">
								<img class="background-image" alt="Background Image" src="img/s2.jpg">
							</div>
							
						</li>
	                    
	                    <li class="overlay">
							<div class="background-image-holder parallax-background">
								<img class="background-image" alt="Background Image" src="img/s3.jpg">
							</div>
							
						</li>                    
	                    
                        <li class="overlay">
							<div class="background-image-holder parallax-background">
								<img class="background-image" alt="Background Image" src="img/s4.jpg">
							</div>
						</li>	
					</ul>

</section>
<section class="pure-text-centered gris celeste">
					<div class="container ">
						<div class="row ">
							<div class="col-lg-10 col-lg-offset-1 text-center ">
								
						      <h1>QUIENES SOMOS</h1>
								<h4 class="tx_gris">Somos una empresa especializada en el  entretenimiento móvil, desde el año 2007 llevamos toda la diversión al lugar  que el cliente lo solicite. Contamos con amplia variedad de juegos para niños y adultos. <br>
								  <br>
								  Ofrecemos todo tipo de inflables, juegos  mecánicos, metegoles, tejos de aire, pool, ping pong, pantallas y proyectores, consolas de video juegos. <br>
								  <br>
								 Nuestro objetivo es brindar a nuestros  clientes la tranquilidad de contar con un servicio completo y juegos de  calidad, para que su evento sea todo un éxito.  <br>
								 <br>
								  Contamos  con una amplia zona de cobertura que incluye Gran Buenos Aires y Capital  Federal.  <br>
								  <br>
								Nuestros clientes y años de experiencia en  el rubro del entretenimiento avalan nuestra seriedad, responsabilidad y  excente calidad en  servicio.<br>
								<br>
								 Nuestros personal es profesional,  capacitado y especializado en cada área de entretenimiento que ofrecemos, como  así también en la atención al cliente y control de calidad.</h4>
							</div>
						</div>			
					</div>
</section>
<section class="duplicatable-content rojo">
					
					<div class="container">					
						
						<div class="row">
							<h1 class="text-white centrar">PRODUCTOS DESTACADOS</h1><br>
							
							<?php foreach ($productos as $producto): ?>
							<div class="col-md-4 col-sm-6">
								<div class="blog-snippet-1">									
									<a href="<?php echo $this->Url->build([
										    "controller" => "Productos",
										    "action" => "view",
		                    				$producto->id
										]) ?>">
										<img alt="<?php echo $producto->descripcion?>" src=<?= !empty($producto->fotos_productos[0]->referencia) ? h($producto->fotos_productos[0]->referencia) :  "" ?> >
									</a>
									<h2 class="text-white centrar"><?= h($producto->descripcion) ?></h2>
									<p class="text-white"><strong>Medida: </strong><?= h($producto->dimensiones) ?></p>
									<p class="text-white"><strong>Precio: $</strong> <?= h($producto->precio) ?></p>
									<a href="<?php echo $this->Url->build([
										    "controller" => "Productos",
										    "action" => "view",
		                    				$producto->id
										]) ?>" class="text-white"><span class="text-white">Ver más <i class="icon arrow_right"></i></span></a>
								</div>
							</div>
							<?php endforeach; ?>
							<!--<div class="col-md-4 col-sm-6">
								<div class="blog-snippet-1">									
									<a href="#">
										<img alt="Blog Thumb" src="webroot/img/chicos/cubo/1.jpg" >
									</a>
									<h2 class="text-white centrar">Cubo / opcional con pelotas</h2>
									<p class="text-white"><strong>Medida: </strong>ancho 2 - largo 2,50 - alto 2,30</p>
									<p class="text-white"><strong>Precio: $</strong> ..... </p>
									<a href="#" class="text-white"><span class="text-white">Ver más <i class="icon arrow_right"></i></span></a>
								</div>
							</div>
							
							<div class="col-md-4 col-sm-6">
								<div class="blog-snippet-1">
									<a href="#">
										<img alt="Blog Thumb" src="webroot/img/chicos/mickey/1.jpg" >
									</a>
									<h2 class="text-white centrar">Mickey y Minnie</h2>
									<p class="text-white"><strong>Medida: </strong>ancho 3 - largo 3,50 - alto 2,30</p>
									<p class="text-white"><strong>Precio: $</strong> ..... </p>
									<a href="#" class="text-white"><span class="text-white">Ver más <i class="icon arrow_right"></i></span></a>
								</div>
							</div>
							
							<div class="col-md-4 col-sm-6">
								<div class="blog-snippet-1">
									<a href="#">
										<img alt="Blog Thumb" src="webroot/img/chicos/ringv/1.jpg" >
									</a>
									<h2 class="text-white centrar">Ring V</h2>
									<p class="text-white"><strong>Medida:</strong> ancho 4,50 - largo 4    - alto 3,60</p>
									<p class="text-white"><strong>Precio: $</strong> ..... </p>
									<a href="#" class="text-white"><span class="text-white">Ver más <i class="icon arrow_right"></i></span></a>
								</div>
							</div>-->
						</div>	
					</div>
				</section>
<div class="row" id="load-more-row">
	        		<div class="load-more col-lg-12">
	        			<span id="load-more">
	        				<span class="plus">
	        					<div class="plus">
	        					</div>
	        				</span>
	        				<?= $this->Html->link('Condiciones Generales',['controller' => 'productos', 'action' => 'condiciones'],['class' => 'neg'])?>
<!-- 	        				<a href="#" class="neg">Condiciones Generales</a> -->
	        			</span>
	        		</div>
</div>
	       
	  
	           
				