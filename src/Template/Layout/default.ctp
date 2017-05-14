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
    	    'style',
            'fileinput.min']) ?>
    
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
    		'scripts',
            'fileinput.min'
    		]) ?>

    <script type="text/javascript">
        $('#foto').fileinput();
    </script>
    	
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
  	<?= $this->element('footer') ?>
	
    
</body>
</html>
