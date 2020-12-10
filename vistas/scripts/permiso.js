var tabla;

//Funcion que se ejecuta al inicio


function init()
{
    mostrarform(false);
    listar();
}

//funcion mostrar formulario
function mostrarform(flag)
{
   // limpiar();
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
        $("btnagregar").hide();
    }
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
                url:'../ajax/permisoAjax.php?op=listar',
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

init();