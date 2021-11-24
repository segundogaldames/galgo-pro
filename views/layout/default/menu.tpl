 <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand logo" href="{$_layoutParams.root}">GalgoPro</a>
      </div>
    
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="javascript:void();" class="disabled">{Session::get('usuario')}</a></li>
          <li><a href="{$_layoutParams.root}index">Home</a></li>
          <li><a href="#tf-service">Servicios</a></li>
          <li><a href="#tf-portfolio">Portafolio</a></li>
          <li><a href="#tf-about">Acerca de</a></li>
          <li><a href="{$_layoutParams.root}contactos/add">Contacto</a></li>
          {if Session::get('autenticado')}
            {if Session::get('role')=='Administrador'}
            <li><a href="{$_layoutParams.root}admin/">Administrar</a></li>
            {/if}
            <li><a href="{$_layoutParams.root}usuarios/cerrar">Cerrar Sesión</a></li>
          {else}
            <li><a href="{$_layoutParams.root}usuarios/login">Iniciar Sesión</a></li>
          {/if}
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>



