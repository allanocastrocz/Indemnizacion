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
        <a class="nav-link" href="indemnizaciones.php">
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
              <a class="nav-link " href="#" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600">F</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                  <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                </svg>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">



          <div class="row justify-content-md-center mt-5">
            <div class="col-6">
              <div class="text-center texto">
                <h1 class="ml-3">Registro de usuario</h1>
              </div>
              <!-- Formulario para iniciar sesión -->
              <form id="signup">
                <!--Correo electrónico/-->
                <div class="form-group form-label-group my-3">
                  <label for="inputEmail">Correo electrónico</label>
                  <input class="form-control" type="email" id="inputEmail" name="email" placeholder="ejemplo@email.com" style="border-radius: 50px;" required />
                  <div class="invalid-feedback">Formato correcto: algo@dominio.extension</div>
                </div>

                <!--Nombre/-->
                <div class="form-group form-label-group my-3">
                  <label for="inputCont">Nombre</label>
                  <input class="form-control" type="text" id="inputNombre" name="nombre" placeholder="Nombre" style="border-radius: 50px;" required />
                  <div class="invalid-feedback">No usar caracteres especiales</div>
                </div>

                <!--Nombre/-->
                <div class="form-group form-label-group my-3">
                  <label for="inputCont">Apellido</label>
                  <input class="form-control" type="text" id="inputApellido" name="appat" placeholder="Apellido" style="border-radius: 50px;" required />
                  <div class="invalid-feedback">No usar caracteres especiales</div>
                </div>

                <!--Contraseña/-->
                <div class="form-group form-label-group my-3">
                  <label for="inputCont">Contraseña</label>
                  <input class="form-control" type="password" id="inputCont" name="cont" placeholder="Contraseña" style="border-radius: 50px;" required />
                  <div class="invalid-feedback">Formato correcto: Mínimo 6 caracteres; alternar entre números, mayúsculas y minúsculas</div>
                </div>

                <!-- Repetir Contraseña/-->
                <div class="form-group form-label-group my-3">
                  <label for="inputCont">Repetir contraseña</label>
                  <input class="form-control" type="password" id="inputRepCont" name="repcont" placeholder="Confirmar contraseña" style="border-radius: 50px;" required />
                  <div class="invalid-feedback">Las contraseñas no coinciden</div>
                </div>

                <!--Botón para iniciar sesión-->
                <div class="col-sm-12 my-5">
                  <button class="btn btn-block btn-danger text-white btn-user" style="border-radius: 50px;" id="sesionBtn" type="submit">
                    Registrarse
                  </button>
                </div>
              </form>
            </div>
          </div>




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

    <!-- AlertifyJs -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- Local -->
    <script>
      email_valid = false;
      nombre_valid = false;
      apellido_valid = false;
      cont_valid = false;
      repcont_valid = false;

      $(document).ready(function() {
        alertify.set('notifier', 'position', 'top-right');
        const re_especiales = /^[_A-z0-9 ]*((-|s)*[_A-z0-9 ])*$/;
        const re_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const re_pwd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;

        $('#inputEmail').on('blur', function() {
          email_valid = validateInput($('#inputEmail'), re_email);
          console.log(email_valid);
        });

        $('#inputNombre').on('blur', function() {
          nombre_valid = validateInput($('#inputNombre'), re_especiales);
        });

        $('#inputApellido').on('blur', function() {
          apellido_valid = validateInput($('#inputApellido'), re_especiales);
        });

        $('#inputCont').on('blur', function() {
          cont_valid = validateInput($('#inputCont'), re_pwd);
        });

        $('#inputRepCont').on('blur', function() {
          input = $('#inputRepCont');
          if ($('#inputCont').val() != $('#inputRepCont').val()) {
            input.addClass("is-invalid");
            repcont_valid = false;
          } else {
            input.removeClass("is-invalid");
            repcont_valid = true;
          }
        });

        $('#signup').submit(function(event) {
          event.preventDefault();
          if (email_valid && nombre_valid && apellido_valid && cont_valid && repcont_valid) {
            $.ajax({
              type: "POST",
              url: "database/agregar-user.php",
              data: $(this).serialize(),
              dataType: "JSON",
              success: function(respuesta) {
                console.log(respuesta);
                if (!respuesta['status']) {
                  alertify.warning('No se pudo registrar.');
                } else {
                  window.location.href = 'index.php';
                }
              },
              error: function(jqXHR, exception, errorThrown) {
                alertify.error('Ha ocurrido un error al registrar el nuevo usuario.');
                console.log("Error: " + errorThrown);
              }
            });
          } else {
            alertify.warning('Completa correctamente el formulario.');
          }
        });
      });

      function validateInput(input, re) {
        if (!re.test(input.val())) {
          input.addClass("is-invalid");
          return false;
        } else {
          input.removeClass("is-invalid");
          return true;
        }
      }

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