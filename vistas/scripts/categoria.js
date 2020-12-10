var tabla;

//Funcion que se ejecuta al inicio


function init()
{
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })
}

//funcion limpiar
function limpiar()
{
    $("#idcategoria").val("");
    $("#nombre").val("");
}

//funcion mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide(); //oculto
        $("#formularioresgistro").show(); //visible
        $("#btnGuardar").prop("disable",false);
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioresgistro").hide();
    }
}

//funcion cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//funcion Listar
function listar()
{
    tabla=$('#tbllistado').dataTable(
        {
            "aProcessing": true,  //activamos el procesamiento de datatables
            "aServerSide": true,  //paginacion y filtrado realizados por el servidor
            dom: 'Bfrtip',   //Definimos los elementos del control de tabla
            buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
            ],
        "ajax":
            {         
                url:'../ajax/categoria.php?op=listar',
                type : "get",
                dataType : "json",
                error: function(e){
                    console.log(e.responseText);
                }
            },
        "bDestroy" : true,
        "iDisplayLength": 10, //paginacion
        "order": [[0, "desc" ]] //ordenar columna
        }).DataTable();
}

function guardaryeditar(e)
{
    e.preventDefault(); //no se activara la accion predeterminada del evento
    $("#btnGuardar").prop("disable",true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/categoria.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        {
            alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(idcategoria)
{
    $.post("../ajax/categoria.php?op=mostrar",{idcategoria : idcategoria}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#idcategoria").val(data.idcategoria);

    })
}

//funcion para desactivar registros
function desactivar(idcategoria)
{
    bootbox.confirm("¿Esta seguro de desactivar la Categoria?", function(result){
        if(result)
        {
            $.post("../ajax/categoria.php?op=desactivar", {idcategoria : idcategoria}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function activar(idcategoria)
{
    bootbox.confirm("¿Esta seguro de activar la Categoria?", function(result){
        if(result)
        {
            $.post("../ajax/categoria.php?op=activar", {idcategoria : idcategoria}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}


init();