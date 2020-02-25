<!--Header-->
<?php include_once 'includes/templates/header.php'; ?>

<section class="seccion ">
    <div class="titulo-universidad">
        <h2>Eventos Universidad de Guadalajara</h2>
    </div>
    <?php
    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = "SELECT * ";
        $sql .= "FROM `eventos_udg` ";
        
        $resultado = $conn->query($sql);
        if(!$resultado){
            echo "No hay eventos por el momento";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    ?>

    <div class="calendario contenedor">
        <?php
        $calendario = array();
        while ($eventos = $resultado->fetch_assoc()) {

           
            //Obtiene la fecha del evento
            $fecha = $eventos['fecha'];  //ordenamos por fecha            
             $evento = array(
                 'titulo' => $eventos['evento'],
                 'fecha' => $eventos['fecha'],
                 'hora' => $eventos['hora_inicio'],
                 'categoria' => $eventos['categoria'],
                 'descripcion' =>$eventos['descripcion']
            //     'icono'=> 'fas'." ".$eventos['icono'],
            //     'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
            );

            $calendario[$fecha][] = $evento;
            
            

        ?>

        <?php  } //While fetch_assoc() 
        ?>

            

        <?php
        //Imprime todos los eventos
        foreach ($calendario as $dia => $lista_eventos) { ?>
            <h3>
                <i class="fa fa-calendar"></i>
                <?php setlocale(LC_TIME, 'spanish');
                echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia)));
                ?>                                
            </h3>
            <div class="dias">
                <?php foreach ($lista_eventos as $evento) { ?>
                    
                    <div class="dia">
                        <p class="titulo"><?php echo $evento['titulo']; ?></p>
                        <p class="hora">
                            <i class="far fa-clock" aria-hidden="true"></i>
                            <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                        </p>     
                        <p>               
                            Descripcion: <br>
                            <?php echo $evento['descripcion']; ?>
                        </p>

                    </div>
                    
                    
                    
                    
                <?php } //Cierre foreach eventos             
                ?>
            </div>
        <?php } //foreach días 
        ?>


    </div>

    <?php
    $conn->close();
    ?>

</section class="seccion">









<!--Footer-->
<?php include_once 'includes/templates/footer.php'; ?>