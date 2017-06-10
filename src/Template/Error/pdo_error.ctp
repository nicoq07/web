<div class="col-lg-6 col-lg-offset-3 centrar">
    <br>
    <h2><?= __d('cake', '¡Tenemos un problema!') ?></h2>
    <br>
    <p class="error">
        <strong><?= __d('cake', 'Error') ?>: </strong>
        <?= h($message) ?>
    </p>
    <br>
    <p><strong>- No puede realizar ésta acción. Es posible que existan elementos activos relacionados. Comuníquese con el administrador.</strong></p>
    <br>
</div>