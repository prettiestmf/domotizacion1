$('#tableactividad').DataTable();
var tableactividad;

document.addEventListener('DOMContentLoaded',function(){
    tableactividad = $('#tableactividad').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/actividad/table_actividad.php",
            "dataSrc":""
        },
        "columns": [
            {"data":"acciones"},
            {"data":"actividad_id"},
            {"data":"nombre_actividad"},
            {"data":"estado"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0,"asc"]]
    });

    var formActividad = document.querySelector('#formActividad');
    formActividad.onsubmit = function(e) {
        e.preventDefault();

        var idactividad = document.querySelector('#idactividad').value;
        var nombre = document.querySelector('#nombre').value;
        var estado = document.querySelector('#listEstado').value;

        if(nombre == '') {
            swal('Atencion','Todos los campos son necesarios','error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/actividad/ajax-actividad.php';
        var form = new FormData(formActividad);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    $('#modalActividad').modal('hide');
                    formActividad.reset();
                    swal('Actividad',data.msg,'success');
                    tableactividad.ajax.reload();
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
    }
})

function openModal_act() {
    document.querySelector('#idactividad').value = 0;
    document.querySelector('#tituloModal').innerHTML = 'Nueva Actividad';
    document.querySelector('#action').innerHTML = 'Guardar';
    document.querySelector('#formActividad').reset();
    $('#modalActividad').modal('show');
}

function editarActividad(id) {
    var idactividad = id;

    document.querySelector('#tituloModal').innerHTML = 'Actualizar Actividad';
    document.querySelector('#action').innerHTML = 'Actualizar';

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/actividad/edit-actividad.php?idactividad='+idactividad;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    document.querySelector('#idactividad').value = data.data.actividad_id;
                    document.querySelector('#nombre').value = data.data.nombre_actividad;
                    document.querySelector('#listEstado').value = data.data.estado;

                    $('#modalActividad').modal('show');
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
}

function eliminarActividad(id) {
    var idactividad = id;

    swal({
        title: "Eliminar Actividad",
        text: "Realmente desea eliminar el actividad?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },function(confirm){
        if(confirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var url = './models/actividad/delet-actividad.php';
            request.open('POST',url,true);
            var strData = "idactividad="+idactividad;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    if(data.status) {
                        swal('Eliminar',data.msg,'success');
                        tableactividad.ajax.reload();
                    } else {
                        swal('Atencion',data.msg,'error');
                    }
                }
            }
        }
    })
}