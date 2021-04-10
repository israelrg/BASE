<link rel="stylesheet" type="text/css" href="estilos.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php
    echo "V.1.1 ";
    include('index.html');
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
    
    if($row_cnt === 0){
        include('no.php');
    }
    else{
        include('si.php');
        echo '<table class="table table-striped table-hover  table-dark table-responsive-sm">';
        while($i < $row_cnt && $i<=10){
            mysqli_data_seek ($result, $i);
            $extraido= mysqli_fetch_array($result);
            /*
            echo "<td>- Telefono: +".$extraido['telefono']."</td>";
            echo "<td>- Nombre: ".$extraido['juntada']."</td>";
            //echo "- Apellidos: ".$extraido['Apellidos']."<br/>";
            //echo "- Apellidos: ".$extraido['Apellidos']."<br/>";
            echo "<td>- Sexo: ".$extraido['sexo']."</td>";
            echo "<td>- Localizacion: ".$extraido['column1']."</td>";
            echo "<td>- Mas informacion: ".$extraido['column2']."</td>";
            */
            
            
            

            echo '
            <tr>
            <td>+'.$extraido['telefono'].'</td>
            <td>'.$extraido['juntada'].'</td>
            <td>'.$extraido['sexo'].'</td>
            <td>'.$extraido['column1'].' '.$extraido['column2'].' '.$extraido['column3'].' '.$extraido['column4'].' '.$extraido['column5'].'</td>
            
            </tr>
            ';
            
            
            $i++;
        }
        echo '</table>';
    }
    
    mysqli_free_result($result);
    ;
    mysqli_close($link);

?>