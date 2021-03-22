<?php

include "database/Consultas.php"; 
$queries = new Consultas();

$empleados = $queries->GetAdminNames();

echo json_encode($empleados);