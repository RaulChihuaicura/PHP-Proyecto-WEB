<?php
//activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
  require 'header.php';
  ?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Usuario 
                          <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">
                          <i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead> 
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Rut</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Rut</th>
                            <th>Telefono</th>
                            <th>Cargo</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioresgistro">
                        <!-- FORMULARIO DE REGISTRO -->

                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label>Nombre(*):</label>
                            <input type="hidden" name="idusuario" id="idusuario">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre del usuario"
                            required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Numero Documento(*):</label>
                             <input type="text" class="form-control" name="rut" id="rut" maxlength="12" placeholder="Numero Documento"
                            required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Direccion(*):</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" maxlength="70" placeholder="Direccion Usuario" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telefono(*):</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Correo Electronico(*):</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargo(*):</label>
                            <input type="text" class="form-control" name="cargo" id="cargo" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Login(*):</label>
                            <input type="text" class="form-control" name="login" id="login" maxlength= 20 required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Clave(*):</label>
                            <input type="password" class="form-control" name="clave" id="clave" maxlength= 20 required>
                          </div>
                          <label>Permisos:</label>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul style="list-style: none;" id="permisos">
                            
                            </ul>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                          </div>

                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar">
                            <i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button">
                            <i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>


                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  <?php
  require 'footer.php';
  ?>
  <script type="text/javascript" src="scripts/usuario.js"></script>
<?php
}

ob_end_flush();
?>

