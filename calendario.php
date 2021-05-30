<?php include_once 'includes/templates/header.php'; ?>
    
    
    
    
    
    <section class=" seccion contenedor ">
    <h2>Calendario de eventos</h2>

    <?php 
    try{ 

        require_once('includes/functions/bd_conexion.php');  //crar la conexio
        // $sql = "SELECT * FROM eventos"; //escribir la consulta
        // $resultado = $conn->query($sql); //realziar la consulta

        //forma de realizar la consulta para el proyecto y relacionar tablas de datos:
        
        $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento /*Esta llav debe coincidir con la llave de la tabla a la que vamos a realizar la relacion*/, nombre_invitado, apellido_invitado /*Pendiente con dejar el espacio por el concatenado*/";
        $sql .= " FROM eventos ";
        $sql .= " INNER JOIN categoria_evento "; //La tabla con la que vamos a unir
        $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria "; //Aqui lo que estamos diciendo es que llaves vamos a relacionar indicado tabla.llave, en este caso como llave de eventos coincide con el ID se enlace directo al ID de la tabla. 
        $sql .= "INNER JOIN invitados "; 
        $sql .= "ON eventos.id_inv = invitados.invitado_id ";
        $sql .= "ORDER BY evento_id ";
        $resultado = $conn->query($sql);


        

    } catch(\Exception $e){ //Para comprobar la conexion con la base de datos, es muy similar a un if else
        echo $e->getMessage();
    }
    
    ?>
    <div class="calendario">
        <?php 
            $calendario =  array(); //importante que este fuera del while para que empiece vacio
            while ( $eventos = $resultado->fetch_assoc()) { //imprime los resultados //para buena forma para mostrar los arrays, es necesario el uso del while 
                //obtiene fecha del evento

                $fecha = $eventos['fecha_evento'];
                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => "fa" . " " . $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
                );
                $calendario[$fecha][] = $evento; //agrupa el arreglo por fecha
            }

            //imprimir todos los eventos

            foreach($calendario as $dia => $lista_eventos) /*Como esto es un arreglo anidado el recorrido seria le asigna a la varaible dia el indice de cada arreglo, en este caso ese indice es la fecha, y valor de ese indice que es un arreglo lo guarda en la varible lista_evento */{ ?>
                <h3>
                <i class="fa fa-calendar"></i>
                <?php //echo date("F j, Y", strtotime($dia)) //Muestra las fechas como mes (Letra), dia y año;
                        setlocale(LC_TIME, 'es_Es.UTF-8'); //Setea la fecha en Unix
                        setlocale(LC_TIME, 'spanish.UTF-8'); //Setea fecha en windows
                        echo strftime("%A, %d de %B del %Y", strtotime($dia)); //Muestra fecha con formato 
                ?> 
                </h3>
                <?php foreach($lista_eventos as $evento) /*Aqui accedo a valor dentro de cada llave que esta en evento*/{ ?>
                    
                        <div class="dia">
                            <p class="titulo">
                                <?php 
                                    echo $evento['titulo'];
                                ?>
                            </p>
                            <p class="hora">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                            </p>
                            <p class="categoria">
                            <i class="<?php echo $evento['icono']; ?>"></i>
                                <?php 
                                    echo $evento['categoria'];
                                ?>
                            </p>
                            <p class="invitado">
                            <i class="fa fa-user"></i>
                                <?php 
                                    echo $evento['invitado'];
                                ?>
                            </p>
                        </div>
                    
            <?php }}?>
    </div>

        <?php 
          $conn->close();
        ?>
        
    </section>
   
 

    <?php include_once 'includes/templates/footer.php'; ?>