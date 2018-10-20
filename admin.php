<?php
include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - La nueva fresa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/all.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/bootstrap.css" />
  <link rel="icon" type="img/png" href="assets/img/basic/icono-nuevafresa.ico">
  <link rel="stylesheet" type="text/css" href="assets/pagination/datatables01.css">
  <link rel="stylesheet" href="assets/css/admin01.css">
</head>
<body>
  <div class="container-fluid header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light navbar-admin">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="assets/img/basic/nuevafresa_logo.png" class="logo" alt=""></a>
    
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#table_id">Eventos proximos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#eventos-pas">Eventos pasados</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <button class="btn btn-outline-danger btn-admin my-2 my-sm-0" type="submit">Cerrar Sesi&oacute;n</button>
        </form>
      </div>
    </nav>
  </div>
  <div class="container content">
    <h2 class="display-5 text-uppercase my-4">programaci&oacute;n de eventos futuros</h2>
    <!-- agregar lugar - start -->
    <form method="post">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="form-group row">
            <label for="day" class="col-sm-3 col-form-label">Dia :</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="ndia" id="ndia" placeholder="Dia">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Local :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nlocal" id="nlocal" placeholder="local">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">ticket :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nticket" id="nticket" placeholder="ticket">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="form-group row">
            <label for="lugar" class="col-sm-3 col-form-label">Lugar :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nlugar" id="nlugar" placeholder="lugar">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="form-group row">
            <label for="hora" class="col-sm-3 col-form-label">Hora :</label>
            <div class="col-sm-8">
              <input type="time" class="form-control" name="nhora" id="nhora" placeholder="hora">
            </div>
          </div>
        </div>
      </div>
      <!-- bottom -->
      <div class="row my-4">
        <div class="col-12 d-flex justify-content-end">
          <button type="submit" name="agregar" id="agregar" class="btn btn-outline-primary btn-admin">Agregar</button>
        </div>
      </div>
      </form>
      <!-- agegar lugar - end -->

      <!-- mostrar tabla - start -->
      <div class="row text-center my-5">
        <table id="table_id" class="table table-hover table-striped display">
          <thead>
            <tr class="bg-success">
              <th scope="col">DIA</th>
              <th scope="col">LUGAR</th>
              <th scope="col">LOCAL</th>
              <th scope="col">HORA</th>
              <th scope="col">TICKETS</th>
              <th scope="col">OPCIONES</th>
            </tr>
          </thead>
          <tbody>
               <?php
                                $query="SELECT * FROM p_curso";
                                
                                $consulta = $conexion->query($query);
                                
                                while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                                {
           echo  '
              <tr>
              <th scope="row">'.$fila['dia'].'</th>
              <td>'.$fila['lugar'].'</td>
              <td>'.$fila['local'].'</td>
              <td>'.$fila['hora'].'</td>
              <td><a type="button" class="btn btn-warning data-toggle="tooltip" title="Ir al local"">EN LOCAL</a></td>
              <td><a type="button" class="btn btn-success mx-2" data-placement="top" title="Editar" data-toggle="modal" data-target="#editar">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a type="button" class="btn btn-danger" data-toggle="modal" title="Eliminar" data-target="#eliminar">
                    <i class="fas fa-trash-alt"></i>
                  </a>
              </td>
            </tr>
            ';
                                }
                                ?>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- mostrar tabla - end -->
      <br><br>
      <!-- eventos pasados - start -->
      <h2 class="display-5 text-uppercase mt-5" id="eventos-pas">programaci&oacute;n de eventos pasados</h2>
      <div class="row text-center my-3">
        <table id="table_pas" class="table table-hover table-striped">
          <thead>
            <tr class="bg-danger">
              <th scope="col">DIA</th>
              <th scope="col">LUGAR</th>
              <th scope="col">LOCAL</th>
              <th scope="col">HORA</th>
              <th scope="col">TICKETS</th>
              <th scope="col">OPCIONES</th>
            </tr>
          </thead>
          <tbody>
            <?php
                                $query="SELECT * FROM p_pasadas";
                                
                                $consulta = $conexion->query($query);
                                
                                while ($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                                {
           echo  '
              <tr>
              <th scope="row">'.$fila['dia'].'</th>
              <td>'.$fila['lugar'].'</td>
              <td>'.$fila['local'].'</td>
              <td>'.$fila['hora'].'</td>
              <td><a type="button" class="btn btn-warning">EN LOCAL</a></td>
              <td><a type="button" class="btn btn-success mx-2" data-toggle="modal" data-target="#editar">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminar">
                    <i class="fas fa-trash-alt"></i>
                  </a>
              </td>
            </tr>
            ';
                                }
                                ?>
          </tbody>
        </table>
      </div>
      <!-- eventos pasados - end -->
  </div>
  <!-- modal editar - start -->
  <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-editar">
          <h5 class="modal-title" id="exampleModalLabel">Editar Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="form-group row">
                <label for="day" class="col-sm-3 col-form-label">Dia :</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="day" placeholder="Dia">
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Local :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="day" placeholder="local">
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">ticket :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="day" placeholder="ticket">
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group row">
                <label for="lugar" class="col-sm-3 col-form-label">Lugar :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="day" placeholder="lugar">
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="form-group row">
                <label for="hora" class="col-sm-3 col-form-label">Hora :</label>
                <div class="col-sm-8">
                  <input type="time" class="form-control" id="day" placeholder="hora">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal editar - end -->

  <!-- modal eliminar - start -->
  <div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header modal-eliminar">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Evento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>¿ Estas seguro que desea eliminar el evento ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger">Eliminar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal eliminar - end -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/pagination/datatables01.js"></script>
    <script>$(document).ready(function () {
        $('#table_id').DataTable();
      });</script>
      <script>$(document).ready(function () {
          $('#table_pas').DataTable();
        });</script>
        <script src="assets/js/npresentacion.js"></script>
  </div>
</body>
</html>