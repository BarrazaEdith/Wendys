<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "wendys_db";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo        = $_POST['correo'] ?? '';
        $nombre        = $_POST['nombre'] ?? '';
        $apellido      = $_POST['apellido'] ?? '';
        $nacimiento    = $_POST['fecha_nacimiento'] ?? '';
        $genero        = $_POST['genero'] ?? '';
        $codigo_postal = $_POST['codigo_postal'] ?? '';
        $celular       = $_POST['celular'] ?? '';

        // Verificar si el correo ya existe en la base de datos
        $verificar = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");
        $verificar->execute([':correo' => $correo]);
        $existe = $verificar->fetchColumn();

        if ($existe > 0) {
            echo "<h2>Error: Este correo ya está registrado.</h2>";
            echo "<p>Ya existe una cuenta asociada a este correo. Intenta iniciar sesión.</p>";
            echo "<br><a href='index.html#Sesión'>Regresar</a>";
        } else {
            // Si no existe, se guarda en la base de datos
            $sql = "INSERT INTO usuarios (correo, nombre, apellido, fecha_nacimiento, genero, codigo_postal, celular) 
                    VALUES (:correo, :nombre, :apellido, :nacimiento, :genero, :codigo_postal, :celular)";
            
            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ':correo' => $correo,
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':nacimiento' => $nacimiento,
                ':genero' => $genero,
                ':codigo_postal' => $codigo_postal,
                ':celular' => $celular
            ]);

            echo "<h2>¡Registro exitoso! Tus datos se han guardado correctamente.</h2>";
            echo "<br><a href='index.html'>Regresar al inicio</a>";
        }
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>