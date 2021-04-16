<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
    
    include('index.php');
    //include('header.php');
    $phone = $_POST['phone'];
    define("BUSQUEDA", $phone);
    // echo BUSQUEDA;
    //Maniplacion del string de la entrada
    $prefijo='34';
    if($phone[0]!="+"){
        if($phone[0]=='0' || $phone[0]=='1' || $phone[0]=='2' || $phone[0]=='3' || $phone[0]=='4' || $phone[0]=='5' || $phone[0]=='6' || $phone[0]=='7' || $phone[0]=='8' || $phone[0]=='9'){
        $phone = $prefijo.$phone;
        }
    }
    else
    {
        $phone = substr($phone, 1);
        
    }
    $striglong = strlen($phone);
        
        $i=0;
        for ($i = 0; $i <= $striglong; $i++) {
            if($phone[$i] == '@'){
                $correo = true;
            }
        }
        $i=0;
      
    
    //echo $phone;
    //$phone = '1';
    // ---------CONEXIÓN CON LA BASE DE DATOS----------------------------------
    //basededatos = 'entrenamiento';
    $basededatos = 'pruebafacebook';
    $link = mysqli_connect("127.0.0.1:3306", "israel", "password");
    mysqli_select_db($link, $basededatos);
    $tildes = $link->query("SET NAMES 'utf8'");
    
    //$str = substr($phone, 1);
    
    //$result = mysqli_query($link, "select telefono, nombre, Apellidos, sexo, column1, column2 from importacion where telefono like '%$phone%'"); //Comando de filtrado en mysql
    // Alberto marcos Cea chorizo
    
    if($phone[0]=='0' or $phone[0]=='1' or $phone[0]=='2' or $phone[0]=='3' or $phone[0]=='4' or $phone[0]=='5' or $phone[0]=='6' or $phone[0]=='7' or $phone[0]=='8' or $phone[0]=='9' and $correo == false){
        
        $result = mysqli_query($link, "select telefono, concat_ws(' ', nombre, Apellidos) as juntada,  sexo, column1, column2, column3, column4, column5 from importacion where 
        telefono like '$phone%' limit 10 offset 0;");
        $row_cnt = $result->num_rows;
    }
    else{
        /* ESTE CODIGO FUNCIONA PARA EL NOMBRE 
        $phone = str_replace(' ', ' +', $phone);
        $prefijo = '+';
        $phone = $prefijo.$phone;
        $result = mysqli_query($link, "select telefono, concat_ws(' ', nombre, Apellidos) as juntada,  sexo, column1, column2, column3, column4, column5 from importacion where match(nombre, apellidos) against('$phone' in boolean mode) limit 10 offset 0;");
        $row_cnt = $result->num_rows;
        echo $phone;
        */
        if($correo==true){
            $phone = str_replace(' ', ' +', $phone);
            $phone = str_replace('@', ' ', $phone);
            $prefijo = '+';
            $phone = $prefijo.$phone;
            $result = mysqli_query($link, "select telefono, concat_ws(' ', nombre, Apellidos) as juntada,  sexo, column1, column2, column3, column4, column5 from importacion 
            where match(column1, column2, column3, column4, column5, column6, column7) against('$phone' in boolean mode) limit 10 offset 0;");
            $row_cnt = $result->num_rows;
        }
        else{
            $phone = str_replace(' ', ' +', $phone);
            $prefijo = '+';
            $phone = $prefijo.$phone;
            $result = mysqli_query($link, "select telefono, concat_ws(' ', nombre, Apellidos) as juntada,  sexo, column1, column2, column3, column4, column5 from importacion 
            where match(nombre, apellidos) against('$phone' in boolean mode) limit 10 offset 0;");
            $row_cnt = $result->num_rows;
        }
        
    }
   
    
    

    //echo $phone;
    
    
          
       
        
    

    
    

    
    
    
    
    
    include('tabla.php');
    mysqli_free_result($result);
    mysqli_close($link);

?>