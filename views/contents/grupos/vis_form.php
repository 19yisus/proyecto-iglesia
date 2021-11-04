<!DOCTYPE html>
<html lang="es">
  <?php $this->GetHeader(); ?>
  <body class="hold-transition sidebar-mini sidebar-collapse layout-footer-fixed text-sm">
    <div class="wrapper">

      <!-- Preloader -->
      <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php //echo constant("URL");?>views/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div> -->

      <?php 
        $this->titleContent = "Registro de grupos";

        $this->GetComplement("navbar");
        $this->GetComplement("sidebar");
        require_once("./models/m_db.php");
        
      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php $this->GetComplement("contentHeader");?>
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-cyan">
                        <div class="card-header">
                            <h3 class="card-title">Formulario de registro de grupos</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="formulario" action="<?php echo constant("URL");?>controller/c_grupo.php" name="formulario" method="POST" autocomplete="off" class="needs-validation" novalidate>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="form-group">
                                            <input type="hidden" name="id_grupo">
                                            <label for="nom_grupo">Nombre del grupo</label>
                                            <input type="text" name="nom_grupo" id="nom_grupo" placeholder="Ingrese el nombre del grupo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <label for="">Estado del grupo</label>
                                        <div class="row">
                                            <div class="form-check mx-3">
                                                <input type="radio" name="status_grupo" id="status_grupo" value="1" class="form-check-input">
                                                <label for="status_grupo" class="form-check-label">Activo</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="status_grupo" id="status_grupo" value="0" class="form-check-input">
                                                <label for="status_grupo" class="form-check-label">Innactivo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="ope" value="Registrar" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer text-sm">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.1.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->
<?php $this->GetComplement("scripts");?>
<script>
    $("#formulario").validate({
        submitHandler: function(form) { $(form).submit(); },
        rules:{
            nom_grupo:{
                required: true,
                minlength: 3,
            },
            status_grupo:{
                required: true,
            }
        },
        messages:{
            nom_grupo:{
                required: "Este campo no puede estar vacio",
                minlength: "Debe de contener al menos 3 caracteres",
            },
            status_grupo:{
                required: "Este campo no puede estar vacio",
            }
        },
        errorElement: "span",
        errorPlacement: function (error, element){
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass){
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass){
            $(element).removeClass('is-invalid');
        }
    });
</script>
</html>