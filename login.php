<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "wendys_db";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $correo_login = $_POST['correo_login'] ?? '';
        $password_login = $_POST['password_login'] ?? '';

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :correo");
        $stmt->execute([':correo' => $correo_login]);
        $usuario_encontrado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario_encontrado && password_verify($password_login, $usuario_encontrado['password'])) {
            $nombre = $usuario_encontrado['nombre'];
            header("Location: index.php?mensaje=¡Bienvenido de nuevo, $nombre! Has iniciado sesión correctamente.&tipo=exito#Sesión");
            exit();
        } else {
            header("Location: index.php?mensaje=Correo o contraseña incorrectos.&tipo=error#Sesión");
            exit();
        }
    }
} catch(PDOException $e) {
    $error = $e->getMessage();
    header("Location: index.php?mensaje=Error de conexión: $error&tipo=error#Sesión");
    exit();
}
?>
