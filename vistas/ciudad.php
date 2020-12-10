<?php
//activamos el almacenamiento en el buffer
//ob_start();
//session_start();

//if (!isset($_SESSION["nombre"]))
//{
 // header("Location: login.html");
//}
//else
//{
  require 'header.php';
 // if ($_SESSION['mantencion']==1)
 //  {
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
                          <h1 class="box-title">Mantenedor Ciudad</h1>
                        <div class="box-tools">
                           <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)">
                           <i class="fas fa-plus-circle" ></i> Agregar</button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover table-primary">
                        <thead bgcolor="#85C1E9"> 
                              <th>Descripcion</th>
                              <th>Opciones</th>                    
                         </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                              <th>Descripcion</th>
                              <th>Opciones</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioresgistro">
                        <!-- FORMULARIO DE REGISTRO -->

                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            
                            <label>Nombre Ciudad:</label>
                            <input type="hidden" name="idciudad" id="idciudad">
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="50" placeholder="Nombre de la ciudad"
                            required>
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
 // }
//  else
 // {
 //    require 'noacceso.php';
  //} 

  require 'footer.php';
  ?>
  <script type="text/javascript" src="scripts/ciudad.js"></script>


