
<?php
echo "V.1.4 ";
include('header.html');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transparent Search Box</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="loader.css">
    <style>
        
    </style>
    
    
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
        function loadinggg(){
            document.getElementById('cener').style.backgroundColor = 'red';
            
    }
    $(document).ready(function() {
        var $btn = $('#btnnn');
        var $data = $('.data');
        var $loader = $('.loader');


        $btn.click(function() {

            
            document.getElementById('padreloader').innerHTML = '<div class="loader">Buscando...</div>';

            //calling function
            
        });

    });
    
    </script>

<body>
    <form action="base.php" method="post">
        <div class="wrapper">
            <div id="cener">
                <h1>Comprueba si tus datos han sido filtrados</h1>
                
                <div class="search_box">
                    <input type="text" name="phone" placeholder="Introduzca la busqueda">

                    <button type="submit"  id="btnnn"><i class="fas fa-search btn"></i></button>
                </div>
            </div>
        </div>
    </form>

    

    <div id="padreloader"></div>

    
    

</body>

</html>
