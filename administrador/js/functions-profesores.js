$('#tableprofesores').DataTable();
var tableprofesores;

document.addEventListener('DOMContentLoaded',function(){
    tableprofesores = $('#tableprofesores').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/profesores/table_profesores.php",
            "dataSrc":""
        },
        "columns": [
            {"data":"acciones"},
            {"data":"profesor_id"},
            {"data":"nombre"},
            {"data":"direccion"},
            {"data":"cedula"},
            {"data":"telefono"},
            {"data":"correo"},
            {"data":"nivel_est"},
            {"data":"estado"}
        ],
        "dom": "lBfrtip",
        "buttons": [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr": "Copiar",
                "className": "btn btn-secondary"
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
                "text": "<i class='far fa-csv'></i>Excel",
                "titleAttr": "Exportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0,"asc"]]
    });

    var formProfesor = document.querySelector('#formProfesor');
    formProfesor.onsubmit = function(e) {
        e.preventDefault();

        var idprofesor = document.querySelector('#idprofesor').value;
        var nombre = document.querySelector('#nombre').value;
        var direccion = document.querySelector('#direccion').value;
        var cedula = document.querySelector('#cedula').value;
        var clave = document.querySelector('#clave').value;
        var telefono = document.querySelector('#telefono').value;
        var correo = document.querySelector('#correo').value;
        var nivel_est = document.querySelector('#nivel_est').value;
        var estado = document.querySelector('#listEstado').value;

        if(nombre == '' || direccion == '' || cedula == '' || telefono == '' || correo == '' || nivel_est == '') {
            swal('Atencion','Todos los campos son necesarios','error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/profesores/ajax-profesores.php';
        var form = new FormData(formProfesor);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    $('#modalProfesor').modal('hide');
                    formProfesor.reset();
                    swal('Profesor',data.msg,'success');
                    tableprofesores.ajax.reload();
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
    }
})

function openModal_pro() {
    document.querySelector('#idprofesor').value = 0;
    document.querySelector('#tituloModal').innerHTML = 'Nuevo Profesor';
    document.querySelector('#action').innerHTML = 'Guardar';
    document.querySelector('#formProfesor').reset();
    $('#modalProfesor').modal('show');
}

function editarProfesor(id) {
    var idprofesor = id;

    document.querySelector('#tituloModal').innerHTML = 'Actualizar Profesor';
    document.querySelector('#action').innerHTML = 'Actualizar';

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/profesores/edit-profesor.php?idprofesor='+idprofesor;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    document.querySelector('#idprofesor').value = data.data.profesor_id;
                    document.querySelector('#nombre').value = data.data.nombre;
                    document.querySelector('#direccion').value = data.data.direccion;
                    document.querySelector('#cedula').value = data.data.cedula;
                    document.querySelector('#telefono').value = data.data.telefono;
                    document.querySelector('#correo').value = data.data.correo;
                    document.querySelector('#nivel_est').value = data.data.nivel_est;
                    document.querySelector('#listEstado').value = data.data.estado;

                    $('#modalProfesor').modal('show');
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
}

function eliminarProfesor(id) {
    var idprofesor = id;

    swal({
        title: "Eliminar Profesor",
        text: "Realmente desea eliminar el profesor?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },function(confirm){
        if(confirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var url = './models/profesores/delet-profesor.php';
            request.open('POST',url,true);
            var strData = "idprofesor="+idprofesor;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    if(data.status) {
                        swal('Eliminar',data.msg,'success');
                        tableprofesores.ajax.reload();
                    } else {
                        swal('Atencion',data.msg,'error');
                    }
                }
            }
        }
    })
}