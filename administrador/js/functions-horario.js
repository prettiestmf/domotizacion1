$('#tablehorarios').DataTable();
var tablehorarios;

document.addEventListener('DOMContentLoaded',function(){
    tablehorarios = $('#tablehorarios').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/horarios/table_horarios.php",
            "dataSrc":"",
            "error": function (xhr, error, thrown) {
                console.log( 'Ajax error', error, thrown );
            }
        },
        "columns": [
            {"data":"acciones"},
            {"data":"horario_id"},
            {"data":"aula"},
            {"data":"hora_on"},
            {"data":"hora_off"},
            {"data":"dia"},
            {"data":"estado"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0,"asc"]]
    });

    var formHorario = document.querySelector('#formHorario');
    formHorario.onsubmit = function(e) {
        e.preventDefault();

        var horario_id = document.querySelector('#horario_id').value;
        var aula = document.querySelector('#aula').value;
        var hora_on = document.querySelector('#hora_on').value;
        var hora_off = document.querySelector('#hora_off').value;
        var dia = document.querySelector('#dia').value;
        var estado = document.querySelector('#listEstado').value;

        if(nombre == '') {
            swal('Atencion','Todos los campos son necesarios','error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/horarios/ajax-horarios.php';
        var form = new FormData(formHorario);
        request.open('POST',url,true);
        request.send(form);
         request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    $('#modalHorario').modal('hide');
                    formHorario.reset();
                    swal('Horario',data.msg,'success');
                    tablehorarios.ajax.reload();
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        } 
    }
})

function openModal_horario() {
    document.querySelector('#horario_id').value = 0;
    document.querySelector('#tituloModal').innerHTML = 'Nuevo Horario';
    document.querySelector('#action').innerHTML = 'Guardar';
    document.querySelector('#formHorario').reset();
    $('#modalHorario').modal('show');
}

function editarHorario(id) {
    var horario_id = id;

    document.querySelector('#tituloModal').innerHTML = 'Actualizar Horario';
    document.querySelector('#action').innerHTML = 'Actualizar';

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/horarios/edit-horarios.php?horario_id='+horario_id;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    document.querySelector('#horario_id').value = data.data.horario_id;
                    document.querySelector('#aula').value = data.data.aula;
                    document.querySelector('#hora_on').value = data.data.hora_on;
                    document.querySelector('#hora_off').value = data.data.hora_off;
                    document.querySelector('#dia').value = data.data.dia;
                    document.querySelector('#listEstado').value = data.data.estado;

                    $('#modalHorario').modal('show');
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
}

function eliminarHorario(id) {
    var horario_id = id;

    swal({
        title: "Eliminar Horario",
        text: "Realmente desea eliminar el horario?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },function(confirm){
        if(confirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var url = './models/horarios/delet-horarios.php';
            request.open('POST',url,true);
            var strData = "horario_id="+horario_id;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    if(data.status) {
                        swal('Eliminar',data.msg,'success');
                        tablehorarios.ajax.reload();
                    } else {
                        swal('Atencion',data.msg,'error');
                    }
                }
            }
        }
    })
}