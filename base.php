<link rel="stylesheet" type="text/css" href="estilos.css">
<?php
    echo "V.1.0";
    include('header.php');
    $phone = $_POST['phone'];
    //$phone = '1';
    $basededatos = 'pruebafacebook';
    $link = mysqli_connect("127.0.0.1:3306", "israel", "password");
    mysqli_select_db($link, $basededatos);
    $tildes = $link->query("SET NAMES 'utf8'");
    
    $result = mysqli_query($link, "select telefono, nombre, Apellidos, sexo, column1, column2 from importacion where telefono like '%$phone%'"); //Comando de filtrado en mysql
    
    $i = 0;
    
    
    
    $row_cnt = $result->num_rows;
    
    if($row_cnt === 0){
        include('no.php');
    }
    else{
        include('si.php');
        while($i < $row_cnt && $i<=10){
            mysqli_data_seek ($result, $i);
            $extraido= mysqli_fetch_array($result);
            echo "- Telefono: ".$extraido['telefono']."<br/>";
            echo "- Nombre: ".$extraido['nombre']."<br/>";
            echo "- Apellidos: ".$extraido['Apellidos']."<br/>";
            echo "- Sexo: ".$extraido['sexo']."<br/>";
            echo "- Localizacion: ".$extraido['column1']."<br/>";
            echo "- Mas informacion: ".$extraido['column2']."<br/>";
            
            
            
            echo "<br>-------------------------------<br>";
            $i++;
        }
    }
    
    mysqli_free_result($result);
    ;
    mysqli_close($link);

?>