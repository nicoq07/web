<div class="row">
  <div class="col-lg-2">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Ver usuarios', [ 'controller' => 'users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Roles', [ 'controller' => 'roles', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Multas', [ 'controller' => 'multasUser', 'action' => 'index']) ?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pagos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Reservas', [ 'controller' => 'pagosReserva', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Multas', [ 'controller' => 'pagosMultas', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Medios de pago', [ 'controller' => 'mediosPagos', 'action' => 'index']) ?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Ver productos', [ 'controller' => 'productos', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Categorías', [ 'controller' => 'categorias', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Rango de edades', [ 'controller' => 'rangoEdades', 'action' => 'index']) ?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Envíos <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Ver envíos', [ 'controller' => 'envios', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Localidades', [ 'controller' => 'localidades', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Provincias', [ 'controller' => 'provincias', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Paises', [ 'controller' => 'paises', 'action' => 'index']) ?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Facturas', [ 'controller' => 'facturas', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Remitos', [ 'controller' => 'remitos', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Recibos', [ 'controller' => 'recibos', 'action' => 'index']) ?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('Ver reservas', [ 'controller' => 'reservas', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('Estados', [ 'controller' => 'estadosReservas', 'action' => 'index']) ?></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-lg-10">
      <h1>Página de admin</h1>
  	</div>
</div>
