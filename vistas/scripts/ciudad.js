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
    $("#descripcion").val("");
    $("#idciudad").val("");
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
        $("#btnagregar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioresgistro").hide();
        $("#btnagregar").show();
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
                url:'../ajax/ciudad.php?op=listar',
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
        url: "../ajax/ciudad.php?op=guardaryeditar",
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

function mostrar(idciudad)
{
    $.post("../ajax/ciudad.php?op=mostrar",{idciudad : idciudad}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#descripcion").val(data.descripcion);
        $("#idciudad").val(data.idciudad);

    })
}

//funcion para desactivar registros
function eliminar(idciudad)
{​​​​​​​
    bootbox.confirm({​​​​​​​
        message: "¿CUIDADO¡¡¡¡, Esta seguro de Eliminar esta Ciudad?",
        buttons: {​​​​​​​
         confirm: {​​​​​​​
            label: 'Sí',
            className: 'btn-success'
         }​​​​​​​,
         cancel: {​​​​​​​
            label: 'No',
            className: 'btn-danger'
         }​​​​​​​
       }​​​​​​​, 
       callback:  function(result){​​​​​​​
       if(result)
        {​​​​​​​
            $.post("../ajax/ciudad.php?op=eliminar", {​​​​​​​idciudad : idciudad}​​​​​​​, function(e){​​​​​​​
                bootbox.alert(e);
                tabla.ajax.reload();
            }​​​​​​​);
        }​​​​​​​
       }​​​​​​​
    }​​​​​​​)
}​​​​​​​


init();