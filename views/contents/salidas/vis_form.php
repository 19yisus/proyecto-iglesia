<!DOCTYPE html>
<html lang="es">
  <?php $this->GetHeader(); ?>
  <body class="hold-transition sidebar-mini sidebar-collapse layout-footer-fixed text-sm">
    <div class="wrapper" id="VueApp">
      <?php 
        $this->titleContent = "Registro de salida de productos";

        $this->GetComplement("navbar");
        $this->GetComplement("sidebar");
        require_once("./models/m_entrada_salida.php");
        require_once("./models/m_persona.php");

        $model = new m_entrada_salida();
        $NextId_inventario = $model->NextId();
        $datosComedor = $model->GetComedor();

        $model_person = new m_persona();
        $person = $model_person->Get_proveedor();
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
                            <h3 class="card-title">Formulario de registro de salidas </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="formulario" action="<?php echo constant("URL");?>controller/c_entrada_salida.php" name="formulario" method="POST" autocomplete="off" class="needs-validation" novalidate>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="id_invent">Codigo de inventario</label>
                                            <input type="text" name="id_invent" id="id_invent" disabled value="<?php echo $NextId_inventario;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="comedor_id_invent">Comedor(<span class="text-danger text-md">*</span>)</label>
                                            <select name="comedor_id_invent" id="comedor_id_invent" class="custom-select" readonly>
                                                <option value="<?php echo $datosComedor['id_comedor']; ?>" selected><?php echo $datosComedor['nom_comedor'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="orden_invent">N-Orden(<span class="text-danger text-md">*</span>)</label>
                                            <input type="number" maxlength="20" name="orden_invent" id="orden_invent" class="form-control" placeholder="Ingrese el numero de orden">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="concept_invent">Concepto de operacion(<span class="text-danger text-md">*</span>)</label>
                                            <select name="concept_invent" id="concept_invent" class="custom-select">
                                                <option value="">Seleccione una opcion</option>
                                                <option value="O">Comsumo</option>
                                                <option value="V">Vencimiento</option>
                                                <option value="R">Rechazo</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="observacion_invent">Observacion(<span class="text-danger text-md">*</span>)</label>
                                            <textarea name="observacion_invent" minlength="4" maxlength="120" id="" cols="30" rows="2" class="form-control" placeholder="Ingrese una observacion para esta opearcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="">Cantidad de productos(<span class="text-danger text-md">*</span>)</label>
                                            <input type="number" min="0" name="cantidad_invent" id="cant_ope" class="form-control" readonly :value="cantidad_productos">
                                        </div>
                                    </div>
                                    <div class="d-none" v-for="(item, index) in productos" :key="index">
                                        <input type="hidden" name="id_product[]" :value="item.code">
                                        <input type="hidden" name="cantidad_product[]" :value="item.cantidad">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="hidden" name="ope">
                                <button type="button" id="btn" onclick="ope.value = this.value" value="Salida" class="btn btn-primary">Registrar salida</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">Agregar productos</button>
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
      
      <?php 
        $this->GetComplement("footer");
        $this->GetComplement("scripts");
        require_once("./views/contents/salidas/modal.php");
        ?>
    </div>
<!-- ./wrapper -->
<script>
    new Vue({
        el: '#VueApp',
        data: {
        productos: [
            {code: "", cantidad: 0, limite_stock: 0},
        ]
        },
        methods: {
          Duplicar: function () {
            let datos = this.productos[this.productos.length - 1];
            if(typeof datos == "undefined"){
              this.productos.push({code: "", cantidad: 0, limite_stock: 0});
              return false;
            }

            if(datos.cantidad > 0 && datos.code != ""){
              this.productos.push({code: "", cantidad: 0, limite_stock: 0})
            }else{
              Toast.fire({
                icon: "error",
                title: "Selecciona un producto y su cantidad para proceder"
              });
            }
          },
          Disminuir: function(codigo){
            this.productos[codigo].cantidad -= 1;
            if(this.productos[codigo].cantidad === 0 || this.productos[codigo].cantidad < 0) this.productos.splice(codigo, 1);
          },
          consulta_limite_stock: async function(e){
            let resultado = await fetch(`<?php echo constant("URL");?>controller/c_menu-alimentos.php?ope=Consultar_producto&id_producto=${e.target.value}`)
            .then( response => response.json()).then( res => res.data).catch( Err => console.error(Err));
            this.productos[e.target.dataset.index].limite_stock = resultado.stock_product;
            
          }
        },
        computed: {
            cantidad_productos: function(){
                if(this.productos.length === 0) return 0;
                let total = this.productos.reduce( (item1, item2) => parseInt(item1.cantidad) + parseInt(item2.cantidad) );
                if(typeof total === "object") return parseInt(total.cantidad); else return parseInt(total);
            }
        }
    })

    const Consultar = async (value) => {
      
    }

    $("#btn").click( async () =>{
        if($("#formulario").valid()){
            let res = await Confirmar();
            if(res) $("#formulario").submit();
        }
    })

    // $(".special_select2").select2();

    $("#formulario").validate({
        rules:{
            orden_invent:{
              number: true,
              maxlength:20,
            },
            person_id_invent:{
              required: true,
            },
            observacion_invent:{
              required: true,
              minlength: 4,
              maxlength: 120,
            },
            cantidad_invent:{
              required: true,
              min: 1,
            },
            concept_invent:{
              required: true,
            }
        },
        messages:{
            orden_invent:{
              number: "Solo se aceptan numeros",
              maxlength:"Maximo 20 caracteres numericos",
            },
            person_id_invent:{
              required: "Debe seleecionar un proveedor",
            },
            observacion_invent:{
              required: "La observacion para esta operacion es necesaria",
              minlength: "La observacion puede ser de minimo 4 caracteres",
              maxlength: "Maximo 120 caracteres",
            },
            cantidad_invent:{
              required: "Es necesario tener al menos 1 producto para esta operacion",
              min: "Minimo 1 producto",
            },
            concept_invent:{
              required: "Seleccione el concepto para esta operacion",
            },
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