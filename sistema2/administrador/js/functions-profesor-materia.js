$('#tableprofesormateria').DataTable();
var tableprofesormateria;

document.addEventListener('DOMContentLoaded',function(){
    tableprofesormateria = $('#tableprofesormateria').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/profesor-materia/table_profesor_materia.php",
            "dataSrc":""
        },
        "columns": [
            {"data":"acciones"},
            {"data":"pm_id"},
            {"data":"nombre"},
            {"data":"nombre_grado"},
            {"data":"nombre_aula"},
            {"data":"nombre_materia"},
            {"data":"nombre_periodo"},
            {"data":"estadopm"}
        ],
        "dom": "lBfrtip",
        "buttons": [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr": "Exportar a excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-pdf'></i> PDF",
                "titleAttr": "Exportar a PDF",
                "className": "btn btn-danger",
                "exportOptions": {
                    "columns": [ 1, 2, 3, 4, 5, 6, 7, 8 ]
                }
            },{
                "extend": "csvHtml5",
                "text": "<i class='far fa-csv'></i> CSV",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0,"asc"]]
    });

    var formProfesorMateria = document.querySelector('#formProfesorMateria');
    formProfesorMateria.onsubmit = function(e) {
        e.preventDefault();

        var idprofesormateria = document.querySelector('#idprofesormateria').value;
        var nombre = document.querySelector('#listProfesor').value;
        var grado = document.querySelector('#listGrado').value;
        var aula = document.querySelector('#listAula').value;
        var materia = document.querySelector('#listMateria').value;
        var periodo = document.querySelector('#listPeriodo').value;
        var estado = document.querySelector('#listEstado').value;

        if(nombre == '' || grado == '' || aula == '' || materia == '' || periodo == '' || estado == '') {
            swal('Atencion','Todos los campos son necesarios','error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/profesor-materia/ajax-profesor-materia.php';
        var form = new FormData(formProfesorMateria);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    $('#modalProfesorMateria').modal('hide');
                    formProfesorMateria.reset();
                    swal('Crear Profesor Materia',data.msg,'success');
                    tableprofesormateria.ajax.reload();
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
    }
})

function openModalProfesorMateria() {
    document.querySelector('#idprofesormateria').value = 0;
    document.querySelector('#tituloModal').innerHTML = 'Nuevo Profesor Materia';
    document.querySelector('#action').innerHTML = 'Guardar';
    document.querySelector('#formProfesorMateria').reset();
    $('#modalProfesorMateria').modal('show');
}

window.addEventListener('load',function(){
    showProfesor();
    showGrado();
    showAula();
    showMateria();
    showPeriodo();
},false);

function showProfesor() {
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/options/options-profesor.php';
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                data.forEach(function(valor){
                    data += '<option value="'+valor.profesor_id+'">'+valor.nombre+'</option>';
                });
                document.querySelector('#listProfesor').innerHTML = data;
            }
        }
}

function showGrado() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var url = './models/options/options-grado.php';
    request.open('GET',url,true);
    request.send();
    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            data.forEach(function(valor){
                data += '<option value="'+valor.grado_id+'">'+valor.nombre_grado+'</option>';
            });
            document.querySelector('#listGrado').innerHTML = data;
        }
    }
}

function showAula() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var url = './models/options/options-aula.php';
    request.open('GET',url,true);
    request.send();
    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            data.forEach(function(valor){
                data += '<option value="'+valor.aula_id+'">'+valor.nombre_aula+'</option>';
            });
            document.querySelector('#listAula').innerHTML = data;
        }
    }
}

function showMateria() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var url = './models/options/options-materia.php';
    request.open('GET',url,true);
    request.send();
    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            data.forEach(function(valor){
                data += '<option value="'+valor.materia_id+'">'+valor.nombre_materia+'</option>';
            });
            document.querySelector('#listMateria').innerHTML = data;
        }
    }
}

function showPeriodo() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var url = './models/options/options-periodo.php';
    request.open('GET',url,true);
    request.send();
    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            data.forEach(function(valor){
                data += '<option value="'+valor.periodo_id+'">'+valor.nombre_periodo+'</option>';
            });
            document.querySelector('#listPeriodo').innerHTML = data;
        }
    }
}

function editarProfesorMateria(id) {
    var idprofesormateria = id;

    document.querySelector('#tituloModal').innerHTML = 'Actualizar Profesor Materia';
    document.querySelector('#action').innerHTML = 'Actualizar';

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/profesor-materia/edit-profesor-materia.php?id='+idprofesormateria;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    document.querySelector('#idprofesormateria').value = data.data.pm_id;
                    document.querySelector('#listProfesor').value = data.data.profesor_id;
                    document.querySelector('#listGrado').value = data.data.grado_id;
                    document.querySelector('#listAula').value = data.data.aula_id;
                    document.querySelector('#listMateria').value = data.data.materia_id;
                    document.querySelector('#listPeriodo').value = data.data.periodo_id;
                    document.querySelector('#listEstado').value = data.data.estadopm;

                    $('#modalProfesorMateria').modal('show');
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
}

function eliminarProfesorMateria(id) {
    var idprofesormateria = id;

    swal({
        title: "Eliminar Proceso",
        text: "Realmente desea eliminar el proceso?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },function(confirm){
        if(confirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var url = './models/profesor-materia/delet-profesor-materia.php';
            request.open('POST',url,true);
            var strData = "id="+idprofesormateria;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    if(data.status) {
                        swal('Eliminar',data.msg,'success');
                        tableprofesormateria.ajax.reload();
                    } else {
                        swal('Atencion',data.msg,'error');
                    }
                }
            }
        }
    })
}