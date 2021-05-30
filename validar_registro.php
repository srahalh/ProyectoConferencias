<?php include_once 'includes/functions/funciones.php'; ?>
<?php if(isset($_POST['submit'])): 
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $regalo = $_POST['regalo'];
            $total = $_POST['total_pedido'];
            $fecha = date('Y-m-d H:i:s'); 
            //Pedidos
            $boletos = $_POST['boletos'];
            $camisas = $_POST['pedido_camisas'];
            $etiquetas = $_POST['pedido_etiquetas'];
            $pedido = productos_json($boletos, $camisas, $etiquetas); //Convertir los productos en JSON
            //Eventos
            $eventos = $_POST['registro'];
            $registro = eventos_json($eventos);
            //Se convierte en JSON porque es mas facil agregar ese valor a la base de datos. 
            //Preparando para cargar datos a la base de datos, el statement prepared evita la inyeccion de sql a la base de datos ocmo ataque
            try{
                require_once 'includes/functions/bd_conexion.php';
                $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, 
                                                                fecha_registro, pases_articulos, talleres_registrados, 
                                                                regalo, total_pagado) VALUES (?,?,?,?,?,?,?,?) ");
                $stmt->bind_param("ssssssis"/*Es la forma de colocarlo el tipo de variable s es string e i es entero (deben seguir un orden) */, 
                                 $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                header('Location: validar_registro.php?exitoso=1');//Con esto aseguramos que los datos no se vuelvan a reinsentar en la base de datos
                /*Se debe colocar toda la funcion php antes de que se mande algun dato al navegador, ya que es la unica manera de que funcione */
            } catch (exception $e){
                $error = $e->getMessage();
            }
        endif;  ?>
<?php include_once 'includes/templates/header.php'; ?>
    <section class=" seccion contenedor ">
        <h2>Resumen registro</h2>

        <?php 
            if(isset($_GET['exitoso'])){
                if($_GET['exitoso'] == "1"){
                    echo "Registro Exitoso";
                }
            }
         ?>
    </section>
<?php include_once 'includes/templates/footer.php'; ?>