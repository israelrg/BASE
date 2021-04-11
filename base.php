<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
    
    include('index.php');
    //include('header.php');
    $phone = $_POST['phone'];
    //Maniplacion del string de la entrada
    if($phone[0]=="+")
    {
        $phone = substr($phone, 1);
    }
    
    //echo $phone;
    //$phone = '1';
    // ---------CONEXIÓN CON LA BASE DE DATOS----------------------------------
    $basededatos = 'entrenamiento';
    $link = mysqli_connect("127.0.0.1:3306", "israel", "password");
    mysqli_select_db($link, $basededatos);
    $tildes = $link->query("SET NAMES 'utf8'");
    
    //$str = substr($phone, 1);
    
    //$result = mysqli_query($link, "select telefono, nombre, Apellidos, sexo, column1, column2 from importacion where telefono like '%$phone%'"); //Comando de filtrado en mysql
    // Alberto marcos Cea chorizo
    $result = mysqli_query($link, "select telefono, concat_ws(' ', nombre, Apellidos) as juntada, sexo, column1, column2 from importacion where 
    telefono like '%$phone%' 
    or concat_ws(' ', nombre, Apellidos) LIKE '%$phone%'
    or sexo like '$phone'
    or column1 like '$phone'
    or column2 like '$phone'
    or column3 like '$phone'
    or column4 like '$phone'
    or column5 like '$phone'
    "); //Comando de filtrado en mysql


    $i = 0;
    
    
    
    $row_cnt = $result->num_rows;
    
    include('tabla.php');
    
    mysqli_free_result($result);
    ;
    mysqli_close($link);

?>