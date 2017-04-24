<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
<!--    /,'login','home' 'font-awesome.css' ,'bootstrap-theme'-->
<?= $this->Html->css(['bootstrap.css','elegant-icons.min','flexslider.min','lightbox.min','line-icons.min','theme','style']) ?>
    
    <?= $this->Html->script(['jquery-3.1.1.min','bootstrap.min','isotope.min.js','jquery.countdown.min','jquery.flexslider-min','jquery.min','jquery.plugin.min','lightbox.min','modernizr-2.6.2-respond-1.1.0.min','npm','scripts','scrollReveal.min','skrollr.min','smooth-scroll.min','spectragram.min','twitterFetcher_v10_min']) ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body >
        <?= $this->element('menu') ?>
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
            <div class="container-fluid">
                <?= $this->fetch('content') ?>
            </div>
         </div>
    <footer>
        
    </footer>
</body>
</html>
