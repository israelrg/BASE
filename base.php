<link rel="stylesheet" type="text/css" href="estilos.css">
<?php
    echo "V.1.0";
    include('header.php');
    $phone = $_POST['phone'];
    //Maniplacion del string de la entrada
    if($phone[0]=="+")
    {
        $phone = substr($phone, 1);
    }
    
    echo $phone;
    //$phone = '1';
    // ---------CONEXIÓN CON LA BASE DE DATOS----------------------------------
    $basededatos = 'entrenamiento';
    $link = mysqli_connect("127.0.0.1:3306", "israel", "password");
    mysqli_select_db($link, $basededatos);
    $tildes = $link->query("SET NAMES 'utf8'");
    
    //$str = substr($phone, 1);
    
    //$result = mysqli_query($link, "select telefono, nombre, Apellidos, sexo, column1, column2 from importacion where telefono like '%$phone%'"); //Comando de filtrado en mysql
    // Alberto marcos Cea chorizo
    $result = mysqli_query($link, "select telefono, nombre, Apellidos, sexo, column1, column2 from importacion where 
    telefono like '%$phone%' 
    or nombre like '$phone%'
    or Apellidos like '$phone%'
    or sexo like '$phone'
    or column1 like '$phone'
    or column2 like '$phone'
    or column3 like '$phone'
    or column4 like '$phone'
    or column5 like '$phone'
    "); //Comando de filtrado en mysql


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
            echo "- Telefono: +".$extraido['telefono']."<br/>";
            echo "- Nombre: ".$extraido['nombre']."<br/>";
            echo "- Apellidos: ".$extraido['Apellidos']."<br/>";
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