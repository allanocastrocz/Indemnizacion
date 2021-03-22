<?php
$repuesta = [
    'status' => false,
    'msg' => null
];
try {
    if (isset($_POST['motivo'])) {
        include_once('conexion.php');

        // datos entrantes
        $motivo = $_POST['motivo'];
        $empleado = $_POST['empleado'];
        $admin = $_POST['admin'];

        /* Inserta los valores de direccion en la tabla correspondiente*/
        $sql = "INSERT INTO indemnizacion (motivo, empleado, administrador)
          VALUES (:motivo, :empleado, :administrador)";
        $valores = [
            ':motivo' => $motivo,
            ':empleado' => $empleado,
            ':administrador' => $admin
        ];
        $declaracion = $pdo->prepare($sql);
        if ($declaracion->execute($valores)) {
            if ($motivo == 2) {
                // Actualiza el status del empleado
                $sql = "UPDATE usuario SET 
                        status= 'I'
                    WHERE id=:empleado";
                $values =  [':empleado' => $empleado];

                $stmt = $pdo->prepare($sql);
                if ($stmt->execute($values)) {
                    $respuesta['status'] = true;
                } else {
                    $respuesta['msg'] = $stmt->errorInfo();
                }
            } else {
                $respuesta['status'] = true;
            }
        } else {
            $respuesta['msg'] = $declaracion->errorInfo();
        }
        // cierra la conexión 
        $pdo = null;
    }
} catch (PDOException $e) {
    $repuesta['msg'] = $e->getMessage();
}
// imprime respuesta en formato JSON
echo json_encode($respuesta);
