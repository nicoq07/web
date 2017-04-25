<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['https://fonts.googleapis.com/css?family=Roboto+Condensed|Varela+Round|Permanent+Marker',
    		'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,600,700%7CRaleway:700',
    		'bootstrap.min',
    		'elegant-icons.min',
    		'flexslider.min',
    		'lightbox.min',
    		'line-icons.min',
    		'theme.css',
    	    'style']) ?>
    
    <?= $this->Html->script([
    		'https://www.youtube.com/iframe_api',
    		'jquery.min',
    		'jquery.plugin.min',
    		'bootstrap.min',
    		'jquery.flexslider-min',	
    		'smooth-scroll.min',
    		'skrollr.min',
    		'spectragram.min',
    		'scrollReveal.min',
    		'isotope.min.js',
    		'twitterFetcher_v10_min',
    		'funcionesAjax.js',
    		'lightbox.min',
    		'jquery.countdown.min',
			'modernizr-2.6.2-respond-1.1.0.min.js',		  			
    		'scripts'
    		]) ?>
    	
    	<?= $this->fetch('meta') ?>
       <?= $this->fetch('script') ?> 
       <?= $this->fetch('css') ?>
       
     

</head>

<body>
	 <div class="loader">
    		<div class="spinner">
			  <div class="double-bounce1"></div>
			  <div class="double-bounce2"></div>
			</div>
    	</div>  
 	<?= $this->element('menu') ?>
 	<div class= "main-container" >
 		<?= $this->Flash->render() ?>
		<?= $this->fetch('content') ?>
 	</div>
  	

        <div class="footer-container">
			<footer class="bg-primary short-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<span class="text-white">
							<p>2017 Fun Club SRL</p>
                            <p> CABA - Bs As - Argentina</p>
							<p>Diseño :: UTN 2017</p></span>
                            
                              <span class="text-white"><p>Contacto</p><p>info@funclub.com.ar</p>
                              <p>Tel. 011 4321-5678 </p></span>
                              <span class="text-white"><p>Horario de atencion telefonica</p>
							<p> L a V de 9 a 12.30hs y de 13.30 a 18hs </p>
							<p>Sab, dom y feriados Guardia de 9 a 14hs</p></span>                              
						</div>
					</div>
				</div>
				
				<div class="contact-action">
					<div class="align-vertical">
						<i class="icon text-white icon-mail"></i>
						<a href="#" class="text-white" onclick="Mostrar('contacto')"><span class="text-white">Enviar un mensaje <i class="icon arrow_right"></i></span></a>
					</div>
				</div>
			</footer>
		</div>
    
</body>
</html>
