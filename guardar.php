<?php
$servidor = "localhost";
$usuario = "root";//usuario predeterminado
$password = "";//sin contrasena
$base_datos = "wendys_db";//nombre de mi base de datos

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$base_datos;charset=utf8", $usuario, $password);//PDO establece la conexion ,en este caso es una nueva conexion a un servidos que permite usar acentos y emojis ,sin contrasena y con usuario predeterminado
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//El DSN Le indica a PHP que nos conectaremos a un motor MySQL

    if ($_SERVER["REQUEST_METHOD"] == "POST") {//post significa que recibe/guarda dentro de la variable 
        $nombre = $_POST['nombre'] ?? '';//en este caso guarda nombre dentro de la variable nombre
        $apellido = $_POST['apellido'] ?? '';
        $celular = $_POST['celular'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $pass_raw = $_POST['password'] ?? '';//post Captura los datos enviados por un formulario HTML y limpia el espacio (tipo lo deja vacio despues de enviarlo)
        $password_hash = password_hash($pass_raw, PASSWORD_DEFAULT);

        $verificar = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");//prepara la conexion para checar y/o selecciona dentro de la tabla usuarios cuantos correos hay
        $verificar->execute([':correo' => $correo]);//esto comprueba si hay un correo que concuerde con el ingresado
        $existe = $verificar->fetchColumn();

        if ($existe > 0) {//si existe
            header("Location: index.php?mensaje=Error: Este correo ya está registrado.&tipo=error#Sesión");
            exit();//saldra este texto porque solo se puede tener 1 correo por sesion
        } else {//si no existe
            $sql = "INSERT INTO usuarios (nombre, apellido, celular, correo, password) VALUES (:nombre, :apellido, :celular, :correo, :password)";
            //solicitara los siguientes datos llevandolo a la tabla de usuarios de mi base de datos
            $stmt = $conexion->prepare($sql);//Prepara la sentencia SQL para proteger la base de datos contra Inyección SQL.
            $stmt->execute([//es como decirle donde se van a guardar pos asi decirlo
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':celular' => $celular,
                ':correo' => $correo,
                ':password' => $password_hash
            ]);

            header("Location: index.php?mensaje=¡Registro exitoso! Ya puedes iniciar sesión.&tipo=exito#Sesión");
            exit();//es a donde llevara despues de iniciar la sesion
        }
    }
} catch(PDOException $e) {//atrapa un error si esta dentro del try,mientras que e$ captura el error especifico relacionado con la base de datos
    $error = $e->getMessage();//Extrae el texto descriptivo del error generado por la base de datos
    header("Location: index.php?mensaje=Error: $error&tipo=error#Sesión");//muestra el mensaje de error 
    exit();//se cierra el catch 
}
?>
