<?php
    $servidor = "sistemas.cucei.udg.mx";
    $usuario = "appcucei";
    $contrasena = "s297MGabj33IWAY4";
    $bd = "eventos_udg";

    $conexion = mysqli_connect('localhost','root', '','eventos_app');    

    //Eventos entre hoy y menos de 3 días ordenados por fecha
    $seleccion = "SELECT * from eventos_udg WHERE(DATEDIFF(fecha, CURDATE()))<3 AND DATEDIFF(fecha, CURDATE())>-1 ORDER BY fecha";
        
    $consulta = mysqli_query($conexion,$seleccion) or die("error en la consulta");

    $eventos;     //Arreglo con los eventos próximos    
    while($row = mysqli_fetch_assoc($consulta)){
        
        $eventos[] = $row;        
    }   

    var_dump($eventos);
    echo "<br>";
    echo json_encode($eventos);
    
    mysqli_close($conexion);


?>