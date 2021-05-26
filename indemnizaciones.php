<?php
session_start();
if (!isset($_SESSION['usuario']))
  Header("Location: signin.php");

include "database/Consultas.php";
$queries = new Consultas();

$empleados = $queries->GetUsuarios();
$admins = $queries->GetAdminNames();
$registros = $queries->GetIndemnizaciones();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <!-- <meta charset="utf-8" /> -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Indemnizaciones</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

  <!-- Alertifyjs -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

  <!-- CSS Local -->
  <style>
    /* body {
      font-size: 25px;
    } */
  </style>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Empresa</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Inicio -->
      <li class="nav-item active">
        <a class="nav-link" href="indemnizaciones.html">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
          </svg>
          <span>Indemnizaciones</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600" style="font-size: 20px;"><?php echo $_SESSION['usuario']['nombre']; ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                  <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                </svg>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="database/logout.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">
          <div class="row justify-content-between mb-3">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d4/Logo-TecNM-2017.png" style="max-height: 100px;" alt="">
            <h1>Indemnizaciones</h1>
            <img src="https://www.lajornadadeoriente.com.mx/wp-content/uploads/2017/11/logo-itpuebla-1.png" style="max-height: 100px;" alt="">
          </div>

          <div class="row mt-3 align-items-center">
            <div class="col-3">
              <a href="indemnizaciones.php?motivo=3" type="button" id="incapacidadBtn" class="btn btn-success shadow btn-lg btn-block 
              <?php if ($_GET['motivo'] == 3) echo "active"; ?>" style="border-radius: 18px;">
                Incapacidad
              </a>
            </div>
            <div class="col-3">
              <a href="indemnizaciones.php?motivo=2" type="button" id="renunciaBtn" class="btn btn-success shadow btn-lg btn-block 
              <?php if ($_GET['motivo'] == 2) echo "active"; ?>" style="border-radius: 18px;">
                Renuncia
              </a>
            </div>
            <div class="col-3">
              <a href="indemnizaciones.php?motivo=1" type="button" id="quiebreBtn" class="btn btn-success bg-gradient shadow btn-lg btn-block 
              <?php if ($_GET['motivo'] == 1) echo "active"; ?>" style="border-radius: 18px;">
                Quiebre de empresa
              </a>
            </div>
            <div class="col-3">
              <a href="indemnizaciones.php?motivo=4" type="button" id="liquidacionBtn" class="btn btn-success shadow btn-lg btn-block 
              <?php if ($_GET['motivo'] == 4) echo "active"; ?>" style="border-radius: 18px;">
                Liquidación
              </a>
            </div>
          </div>

          <div class="card shadow-md mt-3">
            <!-- Card Header - Dropdown -->
            <div class="card-header">
              <h4 class="m-0 font-weight-bold text-info">Vista previa de los derechos</h4>
            </div>
            <!-- Card Body -->
            <div class="card-body py-0" style="font-size: 15px;">
              <table id="tablaDerechos" class="table mb-0">
                <tbody>
                  <?php
                  if (isset($_GET['motivo'])) {
                    $derechos = $queries->GetDerechos($_GET['motivo']);
                    foreach ($derechos as $derecho) { ?>
                      <tr id="<?php echo $derecho['id']; ?>">
                        <td class="text"><?php echo $derecho['derecho']; ?></td>
                        <td class="text"><?php echo $derecho['descrip']; ?></td>
                      </tr>
                    <?php }
                  } else { ?>
                    <tr>
                      <td class="text-danger" style="font-size: 20px;">Elige un tipo de indemnización</td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>

          <div class="card shadow-md mt-3">
            <div class="card-header">
              <h4 class="m-0 font-weight-bold text-info">Cálculo de pago de indemnización</h4>
            </div>
            <div class="card-body">
              <form id"></form>
              <div class="row">
                <div class="col-4">
                  <label class="ml-3" for="inputUser" style="font-size: 25px;"><strong>Empleado</strong></label>
                  <select class="form-control" name="user" id="inputUser" style="font-size:large; border-radius: 18px;" required>
                    <option selected disabled>Selecciona un empleado</option>
                    <?php foreach ($empleados as $empleado) {
                      if ($empleado['puesto'] == 'Empleado' &&  $empleado['status'] == 'A') { ?>
                        <option value="<?php echo $empleado['id']; ?>"><?php echo $empleado['nombre']; ?> <?php echo $empleado['appat']; ?></option>
                    <?php }
                    } ?>
                  </select>
                </div>

                <div class="col-4">
                  <label class="ml-3" for="inputUser" style="font-size: 25px;"><strong>Salario</strong></label>
                  <input id="inputSueldo" type="number" placeholder="Salario mensual" class="form-control" style="font-size:large; border-radius: 18px;">
                </div>

                <div class="col-4">
                  <label class="ml-3" for="inputUser" style="font-size: 25px;"><strong>Pago</strong></label>
                  <input id="outputTotal" type="text" value="0.00" readonly class="form-control" style="font-size:large; border-radius: 18px;">
                </div>
              </div>
              <a id="btnCalcular" class="btn btn-info mt-3">Calcular</a>
            </div>
          </div>

          <input type="text" id="idAdmin" value="<?php echo $_SESSION['usuario']['id']; ?>" style="display: none;">

          <div class="row  justify-content-center my-5">
            <a href="#" id="btnIndemnizacion" type="submit" class="d-none d-sm-inline-block btn-lg btn-primary shadow-md">
              <i class="fas fa-download fa-sm text-white-50"></i> Generar Indemnización
            </a>
          </div>

          <!-- Tabla de registros -->
          <table id="example" class="table table-striped table-bordered mb-3" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Motivo</th>
                <th>Empleado</th>
                <th>Administrador</th>
                <th>Fecha</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($registros as $i => $reg) {
                $fecha = new DateTime($reg['fecha']); ?>
                <tr>
                  <td><?php echo $reg['id']; ?></td>
                  <td><?php echo $reg['motivo']; ?></td>
                  <td><?php echo $reg['nom_emp']; ?></td>
                  <td><?php echo $reg['nom_admin']; ?></td>
                  <td><?php echo  $fecha->format('Y-m-d'); ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

        </div>
        <!-- End of Main Content -->

        <hr class="sidebar-divider my-3">

        <footer class="mt-auto text-dark-50 ">
          <div class="row justify-content-center">
            <h5>Autores:</h5>
            <ul>
              <li>Candanedo Cruz Brenda Jannine</li>
              <li>Castro Cruz Allan Octavio</li>
              <li>Guarneros Rojas Aymeé</li>
              <li>Parra Victorino José Bernardo</li>

            </ul>
          </div>
        </footer>

      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- AlertifyJs -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Local -->
    <script>
      $(document).ready(function() {
        // Propiedades de AlertifyJS
        alertify.set('notifier', 'position', 'top-right');

        // atributos
        var admin = $('#idAdmin').val();

        $('#btnCalcular').on('click', function() {
          var motivo = getParameterByName('motivo');
          var formData = new FormData();
          var salario = $('#inputSueldo').val();

          formData.append('motivo', motivo);
          formData.append('querie', 'derechos');
          if (salario != null) {
            $.ajax({
              type: "POST",
              url: "database/client-queries.php",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,
              dataType: 'JSON',
              success: function(data) {
                // console.log(data);
                if (data['estatus'] == true) {
                  var table = document.getElementById("tablaDerechos");
                  var total = 0;
                  var antig = Math.floor(Math.random() * 5) + 1;

                  for (let index = 0; index < data['valores'].length; index++) {
                    var id = data['valores'][index]['id'];
                    monto = calculaDerecho(salario, id, antig);
                    total += monto;
                    $('#' + id).append("<td>$" + monto + "</td>");
                    console.log(total);
                  }
                  $('#outputTotal').val('$' + total);

                } else {
                  console.debug(data['msg']);
                }
              },
              error: function(jqXHR, exception, errorThrown) {
                console.debug("Error: " + errorThrown);
              }
            });
          } else {
            alertify.warning("Ingresa primero un salario");
          }
        });

        function calculaDerecho(salario, idder, antig) {
          switch (idder) {
            case 1:
              return salario * 3
              break;
            case 2:
              return (salario / 30) * 12 * antig;
              break;
            case 3:
              return (salario * .25) * 6;
              break;
            case 4:
              return (salario / 30) * 15
              break;
            case 5:
              return 5000;
              break;
            case 6:
              return 4000;
              break;
            case 7:
              return 3000;
              break;
              return 3000;
            case 8:
              return 2000;
              break;
            case 9:
              return 10000;
              break;
            case 10:
              return (salario / 30) * 3;
              break;
            case 11:
              return (salario * .25) * 6;
              break;
            case 12:
              return (salario / 30) * 15;
              break;
            case 13:
              return (salario / 30) * 12 * antig;
              break;
              case 17:
              return salario * 3;
              break;
            case 18:
              return (salario / 30) * 20;
              break;
            case 19:
              return (salario / 30) * 12 * antig;
              break;

          }
        }


        // Inicializa la tabla
        $('#example').DataTable({
          scrollX: true,
          language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
          }
        });

        function calcularTotal() {
          // atributos
          motivo = getParameterByName('motivo');
          empleado = $('#inputUser').val();
          salario = $('#inputSueldo').val();

          if (motivo == null) {
            alertify.error('Elige un motivo de indemnización').dismissOthers();
          } else if (empleado == null) {
            alertify.error('Elige un empleado').dismissOthers();
          } else {
            var salida;

            switch (parseInt(motivo)) {
              case 1:
                salida = ((salario / 30) * 12 * 2) + salario * 3 + salario * .2;
                break;

              case 2:
                salida = ((salario / 30) * 12 * 1) + salario + salario * .2;
                break;

              case 3:
                salida = salario * (2 / 3);
                break;
            }
            salida = parseFloat(salida).toFixed(2);
            $('#outputTotal').val('$' + salida);
          }


        }

        // Función OnClick del botón Generar Indemnización
        $(document).on("click", "#btnIndemnizacion", function(e) {
          var motivo = getParameterByName('motivo');
          var empleado = $('#inputUser').val();

          if (motivo == null) {
            alertify.error('Elige un motivo de indemnización');
          } else if (empleado == null) {
            alertify.error('Elige un empleado');
          } else {
            var formulario = new FormData();
            formulario.append('motivo', motivo);
            formulario.append('empleado', empleado);
            formulario.append('admin', admin);

            $.ajax({
              type: "POST",
              url: "database/registrar.php",
              data: formulario,
              processData: false,
              contentType: false,
              dataType: "JSON",
              success: function(respuesta) {
                if (!respuesta['status']) {
                  alertify.error('Ha ocurrido un error al registrar.');
                } else {
                  window.location.href = 'indemnizaciones.php';
                }
              },
              error: function(jqXHR, exception, errorThrown) {
                alertify.error('No se ha podido contactar al servidor.');
                console.log("Error: " + errorThrown);
              }
            });
          }

        });

      });


      // Obtiene los parámetros GET de la url de la página actual
      function getParameterByName(name, url = window.location.href) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
      }
    </script>
</body>

</html>