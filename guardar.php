<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "wendys_db";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'] ?? '';
        $apellido = $_POST['apellido'] ?? '';
        $celular = $_POST['celular'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $pass_raw = $_POST['password'] ?? '';
        $password_hash = password_hash($pass_raw, PASSWORD_DEFAULT);

        $verificar = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");
        $verificar->execute([':correo' => $correo]);
        $existe = $verificar->fetchColumn();

        if ($existe > 0) {
            header("Location: index.php?mensaje=Error: Este correo ya está registrado.&tipo=error#Sesión");
            exit();
        } else {
            $sql = "INSERT INTO usuarios (nombre, apellido, celular, correo, password) VALUES (:nombre, :apellido, :celular, :correo, :password)";
            
            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':celular' => $celular,
                ':correo' => $correo,
                ':password' => $password_hash
            ]);

            header("Location: index.php?mensaje=¡Registro exitoso! Ya puedes iniciar sesión.&tipo=exito#Sesión");
            exit();
        }
    }
} catch(PDOException $e) {
    $error = $e->getMessage();
    header("Location: index.php?mensaje=Error: $error&tipo=error#Sesión");
    exit();
}
?>
