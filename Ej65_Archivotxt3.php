<!DOCTYPE html>
<html lang="es">
<body>
    <meta charset="UTF-8">
    <title>Datos de los alumnos</title>
</head>  
     <h2>Registro de datos de los alumnos de 3°A Programacion</h2>
     <form method="POST">
        Nombre del alumno:
        <input type="text" name="nombre">
        <br><br>
        Edad:
        <input type="number" name="edad">
        <br><br>
        Pasatiempo:
        <input type="text" name="pasatiempo">
        <br><br>
        <button type="submit" name="guardar">Guardar</button>
    </form>

    <h3>Eliminar informacón</h3>
    <form method="POST">
        Dato a eliminar:
        <input type="text" name="eliminar"><br>
        <button type="submit" name="borrar">eliminar</button>
    </form>

    <form method="POST">
        <button type="submit" name="vaciar">Vaciar lista</button>
    </form>

    <?php
    if (isset($_POST['guardar'])) {
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $pasatiempo = $_POST['pasatiempo'];
        file_put_contents("alumnos.txt", $nombre . PHP_EOL, FILE_APPEND);
        echo "<p>Nombre guardado correctamente.</p>";
    
        file_put_contents("edades.txt", $edad . PHP_EOL, FILE_APPEND);
        echo "<p>Edad guardada correctamente.</p>";
    
        file_put_contents("pasatiempos.txt", $pasatiempo . PHP_EOL, FILE_APPEND);
        echo "<p>Pasatiempo guardado correctamente.</p>";
    }

    //Codigo para eliminar
    if (isset($_POST['borrar'])) {
        $eliminar = trim($_POST['eliminar']);

        $lineas = file("alumnos.txt", FILE_IGNORE_NEW_LINES);
        $nuevas = [];

        foreach ($lineas as $linea) {
            if (trim($linea) != $eliminar) {
                $nuevas[] = $linea;
            }
        }
        file_put_contents("alumnos.txt", implode(PHP_EOL, $nuevas));
        echo "<p>Información eliminada correctamente</p>";
    }
    //vaciar toda la lista
    if (isset($_POST['vaciar'])) {
        file_put_contents("alumnos.txt","");
        file_put_contents("edades.txt","");
        file_put_contents("pasatiempos.txt","");
        echo "<p>Lista vaciada correctamente</p>";
    }
    ?>
    
    <h3>Lista de datos de 3°A</h3>
    <?php
    if (file_exists("alumnos.txt")) {
        $contenido = file_get_contents("alumnos.txt");
        echo nl2br($contenido);
    } 
    if (file_exists("edades.txt")) {
        $contenido = file_get_contents("edades.txt");
        echo nl2br($contenido);
    }
    if (file_exists("pasatiempos.txt")) {
        $contenido = file_get_contents("pasatiempos.txt");
        echo nl2br($contenido);
    }
    ?>
</body>
</html>
