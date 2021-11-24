<!DOCTYPE html>
<html>
   <head>
   	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{$titulo|default:"Sin Titulo"}</title>
      <meta name="description" content="Your Description Here">
      <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
      <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="{$_layoutParams.ruta_img}apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{$_layoutParams.ruta_img}apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{$_layoutParams.ruta_img}apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="{$_layoutParams.ruta_css}bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{$_layoutParams.root}views/layout/default/fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="{$_layoutParams.ruta_css}style.css">
    <link rel="stylesheet" type="text/css" href="{$_layoutParams.ruta_css}responsive.css">

    <script type="text/javascript" src="{$_layoutParams.ruta_js}modernizr.custom.js"></script>
    

    <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
     <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
      
      {if isset($_layoutParams.js) && count($_layoutParams.js)}
        {foreach item=js from=$_layoutParams.js}
          <script type="text/javascript" src="{$js}"></script>
        {/foreach}

      {/if}

   </head>
   <body>
    {include file="menu.tpl"}
    
      <div class="row">
            <noscript><p>Debe tener el soporte de Javascript habilitado</p></noscript>
            {if isset($_error)}
              <div style="margin-top: 60px;"></div>
              <p class="alert alert-danger">{$_error}</p>
            {/if}

            {if isset($_mensaje)}
              <div style="margin-top: 60px;"></div>
              <p class="alert alert-success">{$_mensaje}</p>
            {/if}

            {include file=$_contenido}
          </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="{$_layoutParams.ruta_js}jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{$_layoutParams.ruta_js}bootstrap.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="{$_layoutParams.ruta_js}main.js"></script>
    <script type="text/javascript" src="{$_layoutParams.ruta_js}funciones.js"></script>
    
    {include file="header.tpl"}
    {include file="service.tpl"}
    {include file="portfolio.tpl"}
    {include file="about.tpl"}
    {include file="whyme.tpl"}
    {include file="footer.tpl"}
  </body>
</html>