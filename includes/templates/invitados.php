<?php 
        try{ 

            require_once('includes/functions/bd_conexion.php');  //crar la conexion
            $sql = "SELECT * FROM invitados";
            $resultado = $conn->query($sql); 
    ?>
            <section class="invitados contenedor seccion ">
                <h2>Nuestros Invitados</h2>
                <ul class="lista-invitados ">

    <?php   while ( $invitados = $resultado->fetch_assoc()) { ?>
                    <li class="invitado ">
                        <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id'];?>">
                            <img src="img/<?php echo $invitados['url_imagen']; ?>" alt=" ">
                            <p><?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado']; ?></p>
                        </a>
                    </li>
                    <div style="display:none;">
                        <div class="invitado-info modal-invitados" id="invitado<?php echo $invitados['invitado_id']; ?>">
                            <h2><?php echo $invitados['nombre_invitado'] . ' ' . $invitados['apellido_invitado']; ?></h2>
                            <img src="img/<?php echo $invitados['url_imagen']; ?>" alt=" ">
                            <p><?php echo $invitados['descripcion_invitado']; ?></p>
                        </div>
                    </div>
    <?php   } ?> 
                </ul>
            </section>


    <?php 
        } catch(\Exception $e){ //Para comprobar la conexion con la base de datos, es muy similar a un if else
           echo $e->getMessage();
        }


    ?>
        <?php 
          $conn->close();
        ?>
   