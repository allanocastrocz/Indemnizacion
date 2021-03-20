<?php

include "database/Consultas.php"; 
$queries = new Consultas();

$empleados = $queries->GetDerechos(1);

echo json_encode($empleados);