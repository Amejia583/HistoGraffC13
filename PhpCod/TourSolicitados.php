<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HistoGraff</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" type="img/png" href="../Imagenes/favicon.png">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/TourSolicitados.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/toursolicitado.js"></script>
</head>
<body>
<header>
<nav class="navbar navbar-light bg-light navbar-fixed-top">
		  <!--Logo-->
		  <a class="navbar-brand" href="../Administrador.html">
		    <img src="../Imagenes/HistoGraff.png"  width="43" height="35" class="d-inline-block align-top" alt="">
		    HistoGraff
		  </a>
		  <ul>
        <!--Botones de navegacion-->
        <a class="barraNavegacion" href="Guias.php">Guias</a>
        <a class="barraNavegacion" href="Graffiti.php">Editar Galeria</a>
		    <a class="barraNavegacion" href="#">Tours Solicitados</a>
		    <a class="barraNavegacion" href="salirSesion.php">Cerrar Sesion</a>
		  </ul>   
	  </nav>
    <br>
</header>
<center><a href="../agendarTour.html" class="btn btn-info">Agregar Registros</a></center>
<table class="table table-responsive table-striped" >
    <thead>
    <tr>

        <td>Cod_solicitud</td>
        <td>id_solicitante</td>
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Telefono</td>
        <td>Email</td>
        <td>Cantidad</td>
        <td>Fecha_Tour</td>
        <td>Hora_Tour</td>
        <td>Metodo_Pago</td>  
        <td>Borrar registro</td>
        <td>Actualiza registro</td>
        <td>Asignar Guia</td>
            
    </tr>
  </thead>
    <?php
    include ("conexion.php");
    $consulta="SELECT * FROM solicitar_tour";
    $resultado=mysqli_query($conex,$consulta);
    while($mostrar=mysqli_fetch_array($resultado)) {
    ?>
    <tbody>
    <tr>
    <td><?php echo $mostrar ['cod_solicitud'] ?></td>
    <td><?php echo $mostrar ['id_solicitante'] ?></td>
    <td><?php echo $mostrar ['nombre'] ?></td>
    <td><?php echo $mostrar ['apellido'] ?></td>
    <td><?php echo $mostrar ['telefono'] ?></td>    
    <td><?php echo $mostrar ['Email'] ?></td>
    <td><?php echo $mostrar ['cantidad'] ?></td>
    <td><?php echo $mostrar ['fecha_tour'] ?></td>
    <td><?php echo $mostrar ['hora_tour'] ?></td>
    <td><?php echo $mostrar ['metodo_pago'] ?></td>
    <td>
        <button class="btn btn-danger btnBorrar" id="<?php echo $mostrar['cod_solicitud']; ?>">
          Borrar
        </button>
        <!-- <a href="EliminaRegistros.php?id=<?php echo $mostrar['cod_solicitud']; ?>"
        id="eliminar" class="btn btn-danger">Borrar</a> -->
    </td>
    <td>
        <!-- Button Actualizar -->
        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#staticBackdrop">
        <a data-target="#staticBackdrop" class="editar" data-id="<?php echo $mostrar['cod_solicitud'];?>" href="#staticBackdrop?id=<?php echo $mostrar['cod_solicitud'];?>"
        style="color:white">Editar</a>
        </button> 
    </td>
    <td>
    <a href="#staticBackdrop?id=<?php echo $mostrar['cod_solicitud'];?>" class="btn btn-success">Asignar</a>
    </td>
  </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<!-- Modal -->

<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel">Datos del tour</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editar" method="POST">
      <div class="modal-body">
        <input type="hidden" type="text" name="id" id="id" value="">

      <div class="form-group"> 
        <input class="form-control" type="text" name="nombre"  id="nombre" value="" >
      </div>

      <div class="form-group">
        <input class="form-control" type="text" name="apellido" id="apellido" value="">
      </div>

      <div class="form-group">
        <input class="form-control" type="number" name="tel" id="tel"value="" >
      </div>

      <div class="form-group">
        <input class="form-control" type="tel" name="email" id="email"value="" >
      </div>

      <div class="form-group">
        <input class="form-control" type="text" name="cantidad" id="cantidad" value="">
      </div>

      <div class="form-group">
        <input class="form-control" type="time" name="hora" id="hora" value="">
      </div>

      <div class="form-group">
        <input class="form-control" type="date" name="fecha" id="fecha" value="">
      </div>

      <div class="form-group">
        <input class="form-control" type="text" name="metodo" id="metodo" value="">
      </div>
      </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="" class="btn btn-primary">Guardar</button>
          </div>
          </form>
          </div>
          </div>              
          </div>  
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/toursolicitado.js"></script>
</body>
</html>