<?php
include_once('conexion.php');
// objeto de respuesta a cliente
$jsonRes = [
    'status' => false,
    'msg' => null
];
try {
    // verifica exista post
    if (isset($_POST['email'])) {
        // Datos POST de entrada
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $appat = $_POST['appat'];
        $cont = password_hash($_POST['cont'], PASSWORD_DEFAULT);

        /* Inserta los valores de direccion en la tabla correspondiente*/
        $sql = "INSERT INTO usuario (nombre, appat, puesto, nss, salario, status)
          VALUES (:nombre, :appat, :puesto, :nss, :salario, :status)";
        $valores = [
            ':nombre' => $nombre,
            ':appat' => $appat,
            ':puesto' => 'Administrador',
            ':nss' => rand(10000000000, 99999999999),
            ':salario' => 2000,
            ':status' => 'A'
        ];

        $declaracion = $pdo->prepare($sql);
        if ($declaracion->execute($valores)) {
            // Guarda el id del usuario agregado
            $usid = $pdo->lastInsertId();

            // Inserta en la tabla cuentas
            $query = "INSERT INTO cuentas (correo, pwd, adiminstrador)
            VALUES (:correo, :pwd, :administrador)";
            $binding = [
                ':correo' => $email,
                ':pwd' => $cont,
                ':administrador' => $usid
            ];

            $stmt = $pdo->prepare($query);
            if ($stmt->execute($binding)) {
                $jsonRes['status'] = true;
            } else {
                $jsonRes['msg'] = $stmt->errorInfo();
            }

        } else {
            $jsonRes['msg'] = $stmt->errorInfo();
        }
    }
} catch (PDOException $e) {
    $jsonRes['msg'] = $e->getMessage();
}
echo json_encode($jsonRes);
