<?php include_once 'includes/templates/header.php'; ?>
    <section class=" seccion contenedor ">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti totam, cupiditate harum officiis optio iure quis eaque aspernatur illum nobis tempora placeat hic consequuntur recusandae atque doloribus molestias, illo architecto.</p>
    </section>
    <section class="programa clearfix ">
        <div class="contenedor-video clearfix ">
            <video autoplay loop poster="img/bg-talleres.jpg ">
                <source src="video/video.mp4 " type="video/mp4 ">
                <source src="video/video.webm " type="video/webm ">
                <source src="video/video.ogv " type="video/ogg "> 
            </video>
        </div>
        <!-- VIDEO -->
        <div class="contenido-programa ">
            <div class="contenedor ">
                <div class="programa-evento ">
                    <h2>Programa de evento</h2>
    <?php 
            try{ 
                require_once('includes/functions/bd_conexion.php'); 
                $sql = "SELECT * FROM `categoria_evento`"; 
                $resultado = $conn->query($sql);

            } catch(\Exception $e){ //Para comprobar la conexion con la base de datos, es muy similar a un if else
                echo $e->getMessage();
            } 
            ?>
                    <nav class="menu-programa ">
                        <?php 
                            while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                                <?php $categoria = $cat['cat_evento']; ?>
                                <a href="#<?php echo strtolower($categoria)?>"><i class="fa <?php echo strtolower($cat['icono']);?> "></i> 
                                <?php echo strtolower($categoria); ?></a>
                            <?php } ?>
                    </nav>
                    <?php 
                        try{ 
                            require_once('includes/functions/bd_conexion.php');
                            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento, nombre_invitado, apellido_invitado";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento "; 
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                            $sql .= "INNER JOIN invitados "; 
                            $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= "AND eventos.id_cat_evento = 1 ";
                            $sql .= "ORDER BY evento_id LIMIT 2; ";
                            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento, nombre_invitado, apellido_invitado";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento "; 
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                            $sql .= "INNER JOIN invitados "; 
                            $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= "AND eventos.id_cat_evento = 2 ";
                            $sql .= "ORDER BY evento_id LIMIT 2; ";
                            $sql .= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, icono, cat_evento, nombre_invitado, apellido_invitado";
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento "; 
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria "; 
                            $sql .= "INNER JOIN invitados "; 
                            $sql .= "ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= "AND eventos.id_cat_evento = 3 ";
                            $sql .= "ORDER BY evento_id LIMIT 2;";
                            
                        } catch(\Exception $e){ //Para comprobar la conexion con la base de datos, es muy similar a un if else
                            echo $e->getMessage();
                        }
                    ?>
                    <?php $conn->multi_query($sql);  ?>
                    <?php 
                        
                    do{
                            $resultado = $conn->store_result(); //Obtiene los resultados de la ultima consulta
                            $row = $resultado->fetch_all(MYSQLI_ASSOC);//Obtiene todas las filas del arreglo, se coloca el assoc para que el index sea asociativo ?>
                            <?php $i = 0;  ?>
                            <?php foreach($row as $evento){ ?>
                                <?php if($i % 2 == 0) {?>
                                    <div class="info-curso ocultar clearfix " id="<?php echo strtolower($evento['cat_evento']);?>">
                                <?php } ?>
                                        <div class="detalle-evento ">
                                            <h3><?php echo mb_convert_encoding($evento["nombre_evento"],'UTF-8'); ?></h3>
                                            <p><i class="fa fa-clock-o "></i><?php echo $evento['hora_evento'];?></p>
                                            <p><i class="fa fa-calendar "></i><?php echo $evento['fecha_evento'];?></p>
                                            <p><i class="fa fa-user "></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado'];  //pendiente con la referencia en la otra tabla?></p>
                                        </div>
                                    <?php if($i % 2 == 1) {?>
                                        <a href="calendario.php" class="button float-right ">Ver todo</a>
                                    </div>
                                    <?php };?>
                                <?php $i++; ?>
                            <?php }; ?>
                                <?php $resultado->free();//Libera la memoria de los resultados almacenados del gestor de sentencia dado?>
                    <?php } while($conn->more_results() && $conn->next_result()); ?>


                </div>
            </div>
        </div>
        <!-- programa del evento -->
    </section>
    <?php include_once 'includes/templates/invitados.php'; ?>
    <!-- Invitados -->
    <div class="contador parallax ">
        <div class="contenedor ">
            <ul class="resumen-evento ">
                <li>
                    <p class="numero"></p> Invitados</li>
                <li>
                    <p class="numero"></p> Talleres</li>
                <li>
                    <p class="numero"></p> Dias</li>
                <li>
                    <p class="numero"></p> Conferencias</li>
            </ul>
        </div>
    </div>
    <!-- Contador -->
    <section class="precios seccion ">
        <h2>Precios</h2>
        <div class="contenedor ">
            <ul class="lista-precios ">
                <li>
                    <div class="tabla-precio ">
                        <h3>Pase por dia</h3>
                        <p class="numero ">$30</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href=" " class="button hollow ">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio ">
                        <h3>Todos los dias</h3>
                        <p class="numero ">$50</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href=" " class="button ">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio ">
                        <h3>Pase por dos dias</h3>
                        <p class="numero ">$45</p>
                        <ul>
                            <li>Bocadillos Gratis</li>
                            <li>Todas las conferencias</li>
                            <li>Todos los talleres</li>
                        </ul>
                        <a href=" " class="button hollow ">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Precios -->
    <div id="mapa"></div>
    <!-- Mapa -->
    <section class="seccion ">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor ">
            <div class="testimonial ">
                <blockquote>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam sapiente expedita, nihil doloremque, quaerat modi ipsa et autem dicta incidunt est odio? Velit itaque aspernatur id, saepe maiores voluptas similique.
                    </p>
                    <footer><img src="img/testimonial.jpg " alt=" "><cite>Oswaldo Aponte Acevedo<span> Diseñador en @prisma</span></cite></footer>
                </blockquote>
            </div>
            <div class="testimonial ">
                <blockquote>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam sapiente expedita, nihil doloremque, quaerat modi ipsa et autem dicta incidunt est odio? Velit itaque aspernatur id, saepe maiores voluptas similique.</p>
                    <footer><img src="img/testimonial.jpg " alt=" "><cite>Oswaldo Aponte Acevedo<span> Diseñador en @prisma</span></cite></footer>
                </blockquote>
            </div>
            <div class="testimonial ">
                <blockquote>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam sapiente expedita, nihil doloremque, quaerat modi ipsa et autem dicta incidunt est odio? Velit itaque aspernatur id, saepe maiores voluptas similique.</p>
                    <footer><img src="img/testimonial.jpg " alt=" "><cite>Oswaldo Aponte Acevedo<span> Diseñador en @prisma</span></cite></footer>
                </blockquote>
            </div>
        </div>
    </section>
    <!-- Testimonial -->

    <div class="newsletter parallax ">
        <div class="contenido contenedor ">
            <p>Registrate al Newsletter</p>
            <h3>GDLWEBCAMP</h3>
            <a href=" " class="button transparente ">Registro</a>
        </div>
    </div>
    <!-- Newsletter -->
    <div class="contador ">
        <div class="contenedor ">
            <h2>Faltan</h2>
            <ul class="cuenta-regresiva resumen-evento ">
                <li>
                    <p id="dias" class="numero"></p> Dias</li>
                <li>
                    <p id="horas" class="numero"></p> Horas</li>
                <li>
                    <p id="minutos" class="numero"></p> Minutos</li>
                <li>
                    <p id="segundos" class="numero"></p> Segundos</li>
            </ul>
        </div>
    </div>
    <!-- Contador tiempo -->
    <?php include_once 'includes/templates/footer.php'; ?>