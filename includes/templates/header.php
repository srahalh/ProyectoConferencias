<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
    <?php 
        //Para cargar los archivos solo si son necesarios, se coloca en el header porque es lo que carga primero
        $archivo = basename($_SERVER['PHP_SELF']);//Te devuelve el nombre del archivo que estas cargando.
        $pagina = str_replace('.php', '', $archivo);
        
        switch ($pagina) {
            case 'invitados':
                echo '<link rel="stylesheet" href="css/colorbox.css">';
                break;
            case 'conferencia':
                echo '<link rel="stylesheet" href="css/lightbox.css">';
                break;
            case 'calendario':
                echo "";
                break;
        }
        ?>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />

    <meta name="theme-color" content="#fafafa">
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
                <nav class="redes-sociales">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </nav>
                <div class="informacion-evento">
                    <p class="fecha"><i class="fas fa-calendar-alt"></i> 10-12 Dic</p>
                    <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Guadalajara, MX</p>
                    <!-- Informacion Evento -->
                </div>
                <div class="logo">
                    <h1 class="nombre-sitio">GdlWebCamp</h1>
                    <p class="slogan">La mejor conferencia de <span>Diseño Web</span></p>
                </div>
            </div>
        </div>
        <!-- Hero/Encabezado -->

    </header>
    <div class="barra">
        <div class="contenedor posicion ">
            <div class="logotipo"><a href="index.php"><img src="img/logo.svg" alt=""></a></div>
            <div class="menu-movil"><a href="#navegacion"><i class="fas fa-bars"></i></a></div>
            <nav class="navegacion-principal">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a class="OP3" href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
        </div>
        <nav class="navegacion-movil">
                <a href="conferencia.php">Conferencia</a>
                <a href="calendario.php">Calendario</a>
                <a href="invitados.php">Invitados</a>
                <a href="registro.php">Reservaciones</a>
            </nav>
    </div>
    <!-- Cierre de la barra -->