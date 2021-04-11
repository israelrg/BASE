
<?php
echo "V.1.3 ";
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
    <style>
        button,
        input[type="submit"],
        input[type="reset"] {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
    </style>

</head>

<body>
    <form action="base.php" method="post">
        <div class="wrapper">
            <div class="cener">
                <h1>Comprueba si tus datos han sido filtrados</h1>
                <div class="search_box">
                    <input type="text" name="phone" placeholder="Introduzca la busqueda">

                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>