<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Consulta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Formulario de Modificación de Personas</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="formulario" action="<?php echo constant("URL");?>controller/c_persona.php" name="formulario" method="POST" autocomplete="off" class="needs-validation" novalidate>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 col-sm-12">
                                            <div class="form-group">
                                                <label for="id_persona">Cédula(<span class="text-danger text-md">*</span>)</label>
                                                <input type="text" name="id_persona" id="id_persona" class="form-control" hidden>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <select name="tipo_persona" id="" class="custom-select" readonly>
                                                            <option value="V">V</option>
                                                            <option value="R">R</option>
                                                            <option value="E">E</option>
                                                        </select>
                                                    </div>
                                                    <input type="number" name="cedula_persona" id="cedula_persona" placeholder="Ingrese la Cédula o RIF" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="nom_persona">Nombres y Apellidos(<span class="text-danger text-md">*</span>)</label>
                                                <input type="text" name="nom_persona" id="nom_persona" placeholder="Ingrese el nombre de la persona" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="sexo_persona">Sexo(<span class="text-danger text-md">*</span>)</label>
                                                <div class="row">
                                                    <div class="form-check mx-3">
                                                        <input type="radio" name="sexo_persona" id="sexo_persona" value="F" class="form-check-input">
                                                        <label for="sexo_persona" class="form-check-label">Femenino</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="sexo_persona" id="sexo_persona" value="M" class="form-check-input">
                                                        <label for="sexo_persona" class="form-check-label">Masculino</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="telefono_movil_persona">Teléfono Móvil(<span class="text-danger text-md">*</span>)</label>
                                                <input type="text" name="telefono_movil_persona" id="telefono_movil_persona" placeholder="Ingrese su Teléfono Móvil" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(9999) 999-9999&quot;" data-mask="" inputmode="text">
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="telefono_casa_persona">Teléfono de Casa</label>
                                                <input type="text" name="telefono_casa_persona" id="telefono_casa_persona" placeholder="Ingrese su Teléfono de Casa" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(9999) 999-9999&quot;" data-mask="" inputmode="text">
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="if_proveedor">¿Es Proveedor?(<span class="text-danger text-md">*</span>)</label>
                                                <div class="row">
                                                    <div class="form-check mx-3">
                                                        <input type="radio" name="if_proveedor" id="if_proveedor" value="1" class="form-check-input">
                                                        <label for="if_proveedor" class="form-check-label">Sí</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="if_proveedor" id="if_proveedor" value="0" class="form-check-input">
                                                        <label for="if_proveedor" class="form-check-label">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="if_user">¿Tendrá Usuario?(<span class="text-danger text-md">*</span>)</label>
                                                <div class="row">
                                                    <div class="form-check mx-3">
                                                        <input type="radio" name="if_user" id="if_user" value="1" class="form-check-input">
                                                        <label for="if_user" class="form-check-label">Sí</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="if_user" id="if_user" value="0" class="form-check-input">
                                                        <label for="if_user" class="form-check-label">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="correo_persona">Correo(<span class="text-danger text-md">*</span>)</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" name="correo_persona" id="correo_persona" class="form-control" placeholder="Ingrese el Correo de la Persona">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-12">
                                            <div class="form-group">
                                                <label for="direccion_persona">Dirección de la Persona(<span class="text-danger text-md">*</span>)</label>
                                                <textarea name="direccion_persona" id="direccion_persona" cols="30" rows="2" class="form-control" placeholder="Ingrese la Direcion de la Persona"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="hidden" name="ope">
                                    <button type="button" id="btn" onclick="ope.value = this.value" value="Actualizar" class="btn btn-primary"><i class="fas fa-edit"></i> Actualizar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    $("#btn").click( async () =>{
        if($("#formulario").valid()){
            let res = await Confirmar();
            if(!res) return false;

            let datos = new FormData(document.formulario);
            fetch(`<?php echo constant("URL");?>controller/c_persona.php`, {
                method: "POST",
                body: datos,
            }).then( response => response.json())
            .then( res =>{
                FreshCatalogo();
                document.formulario.reset();
                $("#modal-lg").modal("hide");

                Toast.fire({
                    icon: `${res.data.code}`,
                    title: `${res.data.message}`
                });
            }).catch( Err => console.log(Err))
        }
    })

    $("#formulario").validate({
        rules:{
            tipo_persona:{
                required:true,
            },
            cedula_persona:{
                required:true,
                minlength: 7,
                maxlength: 9,
                number: true,
            },
            nom_persona:{
                required:true,
                minlength: 3,
                maxlength: 60,
            },
            sexo_persona:{
                required:true,
            },
            telefono_movil_persona:{
                required:true,
                minlength: 11
            },
            telefono_casa_persona:{
                required:false,
                minlength: 11,
            },
            if_proveedor:{
                required:true,
            },
            if_user:{
                required:true,
            },
            correo_persona:{
                required:true,
                minlength: 20,
                maxlength: 120,
                email: true,
            },
            direccion_persona:{
                required:true,
                minlength: 5,
                maxlength: 120,
            },
            status_persona:{
                required:true,
            }
        },
        messages:{
            tipo_persona:{
                required:"Seleccione el Tipo de Persona",
            },
            cedula_persona:{
                required:"La Cédula es Requerida",
                minlength: "Mínimo de 7 caracteres",
                maxlength: "Máximo de 9 caracteres",
                number: "Sólo se Permiten Números",
            },
            nom_persona:{
                required: "Este Campo NO puede estar Vacio",
                minlength: "Debe de Contener al menos 3 caracteres",
                maxlength: "Máximo de 60 caracteres",
            },
            sexo_persona:{
                required:"Seleccione el Sexo de la Persona",
            },
            telefono_movil_persona:{
                required:"Este Campo NO puede estar Vacio",
                minlength: "Mínimo de 11 caracteres Numéricos"
            },
            telefono_casa_persona:{
                minlength: "Mínimo de 11 caracteres numéricos",
            },
            if_proveedor:{
                required:"Seleccione una Opción",
            },
            if_user:{
                required:"Seleccione una Opción",
            },
            correo_persona:{
                required:"Este Campo NO puede estar Vacio",
                minlength: "Mínimo de 20 caracteres",
                maxlength: "Máximo de 120 caracteres",
                email: "Ingrese un Correo Válido",
            },
            direccion_persona:{
                required:"Este Campo NO puede estar Vacio",
                minlength: "Mínimo de 5 caracteres",
                maxlength: "Máximo de 120 caracteres",
            },
            status_persona:{
                required:"Seleccione una Opción",
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
