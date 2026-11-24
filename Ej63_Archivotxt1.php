<!DOCTYPE html>
<html lang="es">
<body>
    <meta charset="UTF-8">
    <title>Guardar información</title>
</head>
</body> 
     <h2>Guardar información en un archivo</h2>

     <?php
        $nombre = "Ana López";
        file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
        echo "Información guardada correctamente.";
        echo "<br><br>";
     ?>

     <?php
        $nombre = "Laila Cossio";
        file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
        echo "Alumna agregada correctamente.";
     ?>

     <?php
        echo "<br><br>";
        $contenido = file_get_contents("alumnos.txt");
        //echo $contenido;
        echo nl2br($contenido);
    ?>
</body>
</html>