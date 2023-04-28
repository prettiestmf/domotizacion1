$('#tablepagos').DataTable();
var tablepagos;

document.addEventListener('DOMContentLoaded',function(){
    tablepagos = $('#tablepagos').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/pagos/table_pagos.php",
            "dataSrc":""
        },
        "columns": [
            {"data":"acciones"},
            {"data":"id"},
            {"data":"alumno"},
			{"data":"objeto"},
            {"data":"monto"},
            {"data":"estado"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0,"asc"]]
    });

    var formPago = document.querySelector('#formPago');
    formPago.onsubmit = function(e) {
        e.preventDefault();

        var idpago = document.querySelector('#idpago').value;
        var alumno = document.querySelector('#listalumno').value;
		var monto = document.querySelector('#monto').value;
		var metodo = document.querySelector('#listmetodo').value;
		var objeto = document.querySelector('#listobjeto').value;
		var fecha = document.querySelector('#fecha').value;
        var estado = document.querySelector('#listEstado').value;

        if(alumno == '') {
            swal('Atencion','Todos los campos son necesarios','error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/pagos/ajax-pagos.php';
        var form = new FormData(formPago);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
                    $('#modalPago').modal('hide');
                    formPago.reset();
                    swal('Pago',data.msg,'success');
                    tablepagos.ajax.reload();
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
    }
})

function openModal_gra() {
    document.querySelector('#idpago').value = 0;
    document.querySelector('#tituloModal').innerHTML = 'Nuevo Pago';
    document.querySelector('#action').innerHTML = 'Guardar';
    document.querySelector('#formPago').reset();
    $('#modalPago').modal('show');
}

function editarPago(id) {
    var idpago = id;

    document.querySelector('#tituloModal').innerHTML = 'Actualizar Pago';
    document.querySelector('#action').innerHTML = 'Actualizar';

    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var url = './models/pagos/edit-pago.php?idpago='+idpago;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if(data.status) {
					document.querySelector('#idpago').value =  data.data.id_pago;
					document.querySelector('#listalumno').value =  data.data.id_tercero;
					document.querySelector('#monto').value =  data.data.monto;
					document.querySelector('#listmetodo').value =  data.data.id_metodo;
					document.querySelector('#listobjeto').value =  data.data.id_objeto;
					document.querySelector('#fecha').value =  data.data.Fecha;
					document.querySelector('#listEstado').value =  data.data.estado;
					
                    $('#modalPago').modal('show');
                } else {
                    swal('Atencion',data.msg,'error');
                }
            }
        }
}

function eliminarPago(id) {
    var idpago = id;

    swal({
        title: "Eliminar Pago",
        text: "Realmente desea eliminar el pago?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },function(confirm){
        if(confirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var url = './models/pagos/delet-pago.php';
            request.open('POST',url,true);
            var strData = "idpago="+idpago;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function() {
                if(request.readyState == 4 && request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    if(data.status) {
                        swal('Eliminar',data.msg,'success');
                        tablepagos.ajax.reload();
                    } else {
                        swal('Atencion',data.msg,'error');
                    }
                }
            }
        }
    })
}