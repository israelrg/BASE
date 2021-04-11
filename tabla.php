<html>
    <div class="col">
    <?php
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
    ?>
    </div>
</html>