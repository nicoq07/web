<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

/*$this->layout = 'error';

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;*/
?>
<div class="col-lg-6 col-lg-offset-3 centrar">
    <br>
    <h2><?= __d('cake', '¡Tenemos un problema!') ?></h2>
    <br>
    <p class="error">
        <strong><?= __d('cake', 'Error') ?>: </strong>
        <?= h($message) ?>
    </p>
    <br>
    <p><strong>- El elemento al que desea acceder, no está disponible, asegúrese de que dicho elemento exista y esté disponible.</strong></p>
    <br>
</div>
