<?php//define que es un archivo php
$servidor = "localhost";//servidos
$usuario = "root";//con usuario predeterminado
$password = "";//sin contrasena
$base_datos = "wendys_db";//nombre de la base de datos

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $password);//establece la conexion con la base de datos(PDO)
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//configurar cómo PDO maneja los errores.

    if ($_SERVER["REQUEST_METHOD"] == "POST") {//Revisa si la página fue cargada porque el usuario envió un formulario
        $correo_login = $_POST['correo_login'] ?? '';//agarra el correo que el usuario escribio
        $password_login = $_POST['password_login'] ?? '';//agarra la contrasena que el usuario escribio

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = :correo");//consulta en la tabla usuarios un correo que coincida
        $stmt->execute([':correo' => $correo_login]);//Ejecuta la consulta anterior reemplazando de forma segura la etiqueta correo
        $usuario_encontrado = $stmt->fetch(PDO::FETCH_ASSOC);//se podria decir que compara los correos y si no coincide con ninguno lo declara falso

        if ($usuario_encontrado && password_verify($password_login, $usuario_encontrado['password'])) {//checa que el usuario exista y que la contrasena
            $nombre = $usuario_encontrado['nombre'];//sea la misma,si coincide muestra el nombre de el usuario
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
