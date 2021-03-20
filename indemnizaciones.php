<?php
include "database/Consultas.php";
$queries = new Consultas();

$empleados = $queries->GetUsuarios();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
                <span class="mr-2 d-none d-lg-inline text-gray-600" style="font-size: 20px;">Allan Castro</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                  <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                </svg>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
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
          <h1 class="ml-3">Indemnizaciones</h1>
          <div class="row mt-3">
            <div class="col-4">
              <a href="indemnizaciones.php?motivo=3" type="button" id="incapacidadBtn" class="btn btn-success shadow btn-lg btn-block 
              <?php if ($_GET['motivo'] == 3) echo "active"; ?>" style="border-radius: 18px;">
                Incapacidad
              </a>
            </div>
            <div class="col-4">
              <a href="indemnizaciones.php?motivo=2" type="button" id="renunciaBtn" class="btn btn-success shadow btn-lg btn-block 
              <?php if ($_GET['motivo'] == 2) echo "active"; ?>" style="border-radius: 18px;">
                Renuncia
              </a>
            </div>
            <div class="col-4">
              <a href="indemnizaciones.php?motivo=1" type="button" id="quiebreBtn" class="btn btn-success shadow btn-lg btn-block 
              <?php if ($_GET['motivo'] == 1) echo "active"; ?>" style="border-radius: 18px;">
                Quiebre de empresa
              </a>
            </div>
          </div>

          <div class="row mt-5">
            <div class="col-6">
              <label class="ml-3" for="inputUser" style="font-size: 25px;"><strong>Empleado</strong></label>
              <select class="form-control" name="user" id="inputUser" style="border-radius: 18px;">
                <option selected disabled>Selecciona un empleado</option>
                <?php foreach ($empleados as $empleado) {
                  if ($empleado['puesto'] == 'Empleado' &&  $empleado['status'] == 'A') { ?>
                    <option value="<?php echo $empleado['id']; ?>"><?php echo $empleado['nombre']; ?> <?php echo $empleado['appat']; ?></option>
                <?php }
                } ?>
              </select>
            </div>
          </div>

          <div class="card shadow mt-5">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h4 class="m-0 font-weight-bold text-primary">Vista previa de los derechos</h4>
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <ul>
                <?php
                if (isset($_GET['motivo'])) {
                  $derechos = $queries->GetDerechos($_GET['motivo']);
                  foreach ($derechos as $derecho) { ?>
                    <li class="text"><?php echo $derecho['derecho']; ?></li>
                  <?php }
                } else { ?>
                  <li class="text-danger">Elige un tipo de indemnización</li>
                <?php } ?>
              </ul>
            </div>
          </div>

          <div class="d-sm-flex align-items-center justify-content-between my-5">
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-download fa-sm text-white-50"></i> Generar Indemnización
            </a>
          </div>

          <!-- Tabla de registros -->
          <table id="example" class="table table-striped table-bordered mb-5" style="width:100%">
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
              <tr>
                <td>1</td>
                <td>Renuncia</td>
                <td>Natalia Candanedo</td>
                <td>Aymee Guarneros</td>
                <td>2021/03/19</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Incapacidad</td>
                <td>Sonia Viveros</td>
                <td>Allan Castro</td>
                <td>2021/03/19</td>
              </tr>
            </tbody>
          </table>

        </div>
        <!-- End of Main Content -->


        <!-- End of Footer -->
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

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Local -->
    <script src="js/master.js"></script>
</body>

</html>