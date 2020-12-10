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

    $("#imagenmuestra").hide();

    $.post("../ajax/usuario.php?op=permisos&id=", function(r)
    {
    	$("#permisos").html(r);
    });
}

//funcion limpiar
function limpiar()
{
    $("#nombre").val("");
    $("#rut").val("");
    $("#telefono").val("src","");
    $("#email").val("");
    $("#cargo").val();
    $("#login").val("");
    $("#clave").val("");
    $("#imagenmuestra").attr("scr","");
    $("#imagenactual").val("");
    $("#idusuario").val("");
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
                url:'../ajax/usuario.php?op=listar',
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
        url: "../ajax/usuario.php?op=guardaryeditar",
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

function mostrar(idusuario)
{
    $.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#rut").val(data.rut);
        $("#telefono").val(data.telefono);
        $("#email").val(data.email);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/usuario/"+data.imagen);
        $("#imagenactual").val(data.imagen);        
        $("#idusuario").val(data.idusuario);
    });

        $.post("../ajax/usuario.php?op=permisos&id="+idusuario, function(r)
    {
    	$("#permisos").html(r);
    });
}

//funcion para desactivar registros
function desactivar(idusuario)
{
    bootbox.confirm("¿Esta seguro de desactivar el usuario}?", function(result){
        if(result)
        {
            $.post("../ajax/usuario.php?op=desactivar", {idusuario : idusuario}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function activar(idusuario)
{
    bootbox.confirm("¿Esta seguro de activar el usuario?", function(result){
        if(result)
        {
            $.post("../ajax/usuario.php?op=activar", {idusuario : idusuario}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();