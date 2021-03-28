<?php
require_once('Consultas.php');
$consultas = new Consultas();

$salida = [
    'estatus' => true,
    'msg' => null,
    'valores' => null
];

try{
    switch($_POST['querie']){
        case 'derechos':
            $salida['valores'] = $consultas->GetDerechos($_POST['motivo']);
            break;
        default:
            $salida['estatus'] = false;
            $salida['msg'] = 'No hubo coincidencias de consultas';
    }
} catch (PDOException $e) {
    $salida['estatus'] = false;
    $salida['msg'] = $e->getMessage();
}
echo json_encode($salida);
