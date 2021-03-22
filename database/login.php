<?php
if (isset($_POST['email'])) {
    include_once('conexion.php');

    // datos entrantes
    $email = $_POST['email'];
    $password = $_POST['cont'];

    /* Ejecuta una sentencia preparada pasando un array de valores */
    $query = "SELECT * FROM cuentas 
            JOIN usuario ON cuentas.adiminstrador = usuario.id 
            WHERE correo = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);

    // objecto de respuesta (JSON)
    $respuesta = ['datos_correctos' => false] ;
    // usuario encontrado
    if ($stmt->rowCount() > 0) {
        // Datos del usuario en arreglo asociativo
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // verifica contraseña 
        if (password_verify($password, $user['pwd'])) {
            // inicia sesión
            session_start();
            // propiedades de la sesión del usuario
            $_SESSION['usuario']['id'] = $user['adiminstrador'];
            $_SESSION['usuario']['nombre'] = $user['nombre'] . ' ' . $user['appat'];
            $_SESSION['usuario']['correo'] = $user['correo'];
            // respuesta al cliente
            $respuesta['datos_correctos'] = true;
        }
    }
    // cierra la conexión 
    $pdo = null;
    // imprime respuesta en formato JSON
    echo json_encode($respuesta);
} else {
    echo "<h1>ño</h1>";
}
