moment.locale('es');
// en
//moment('2018-08-11').isBetween('2018-08-01', '2018-08-30'); 
const URL = 'http://' + document.getElementById('hostname').value;


const capitalize = (str, allWords = false) => {

    let exp = /^\w/;

    if (allWords) {

        exp = /\b\w/g;

    }

    if (typeof str === 'string') {

        return str.replace(exp, c => c.toUpperCase());

    } else {

        return '';

    }

};

$(document).ready(function () {

    $('table.bootstrap-data-table').DataTable(
        {
            paging: true,
            searching: true,
            responsive: true,
            info: false,
            select: false,
            ordering: false,
            lengthChange: true,
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                }
            }
        }
    );
});

function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);


    document.getElementById("clock").innerHTML = hr + " : " + min + " : " + sec + " " + ap;

}

var time = setInterval(function () {
    startTime()
}, 1000);

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}



$('div.alert').not('.alertnt').delay(10000).fadeOut(350);



//funciones personalizadas

function getInputValueModalIncidente(elem) {
    let data = $(elem).data('value').split(',');

    let id = data[0];
    let elemId = data[1];
    // console.log(data[1]);
    return document.querySelector("#" + elemId).value = id;

}

function getInputValueModal(elem) {
    // $('#nomina_id').val(($(elem).data('value')));
    let sub = $(elem).data('value').split(',');
    let form = document.querySelector(`#form${sub[4]}`);
    let actionValue = document.querySelector(`#form${sub[4]}`).attributes.action.value;
    //let id = document.querySelector(`#id${sub[4]}`).value = sub[0];
    let id = sub[0];
    let nombre = document.querySelector(`#nombre${sub[4]}`);
    let status = document.querySelector(`#status${sub[4]}`);
    let num_usuario_permitido = null;
    //document.querySelector(`#id${sub[4]}`).value = sub[0];
    nombre.value = sub[1];
    status.value = sub[2];
    console.log(sub[3])
    if (sub[3] == 0) {
        num_usuario_permitido = null;
    } else {
        num_usuario_permitido = document.querySelector(`#num_usuario_permitido${sub[4]}`);
        num_usuario_permitido.value = sub[3];
    }

    console.log(actionValue)

    form.attributes.action.value = actionValue + id;

    console.log(form)
    //console.log(document.querySelector(`#form${sub[3]}`).attributes.action.value);
}

function getInputValueModalEstado(elem) {
    // $('#nomina_id').val(($(elem).data('value')));
    let sub = $(elem).data('value').split(',');
    let form = document.querySelector(`#form${sub[4]}`);
    let actionValue = document.querySelector(`#form${sub[4]}`).attributes.action.value;
    //let id = document.querySelector(`#id${sub[4]}`).value = sub[0];
    let id = sub[0];
    let nombre = document.querySelector(`#nombre${sub[4]}`);

    //document.querySelector(`#id${sub[4]}`).value = sub[0];
    nombre.value = sub[1];

    console.log(sub[3])
    if (sub[3] == 0) {
        num_usuario_permitido = null;
    } else {
        num_usuario_permitido = document.querySelector(`#num_usuario_permitido${sub[4]}`);
        num_usuario_permitido.value = sub[3];
    }

    console.log(actionValue)

    form.attributes.action.value = actionValue + id;

    console.log(form)
    //console.log(document.querySelector(`#form${sub[3]}`).attributes.action.value);
}



function verificarIncidente(id) {

    let url = `${URL}/api/verificar_incidente/${id}`;

    fetch(url)
        .then(function (res) {
            console.log(res.status);

            if (res.status == 200) {

                alert('Incidente verificado correctamente!');

                $('.bootstrap-data-table').DataTable().destroy();

                document.querySelector('#btn-verificador').style.display = 'none';
            } else {
                document.querySelector('#btn-verificador').style.display = 'block';
            }
        });
}



//funcion generica de envio de formulario
async function sendFormIncidente(url, method, form_, modal_ = '') {

    let formd = $(form_).get(0);

    const data = new FormData(formd);

    let response = await fetch(`${url}`, {
        method: `${method}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        body: data
    });

    try {
        let res = await response.json();
        $('.modal-close').modal('hide');


        if (res) {
            $('.modal-close').modal('hide');

        } else {
            $('.modal-close').modal('hide');
        }
    } catch (error) {
        if (error) {
            $('.modal-close').modal('hide');
            alert('Error al realizar el registro!')
        }
    }



}





function formValid(elem, reglas, mensajes) {

}

function validSelectRequired(sel, btn) {
    let select_ = document.getElementById(sel);
    let btn_ = document.getElementById(btn);

    console.log(select_)
    //validamos que los campos no esten vacios
    if (select_.value === "") {
        btn_.disabled = true;
        document.getElementById('selet_msj').innerHTML = "<span style='color:red;'>Este campo es requerido!</span>";
    } else {
        btn_.disabled = false;
        document.getElementById('selet_msj').innerHTML = "";
    }
}




function setOnliNumber(event) {
    if (event.charCode >= 48 && event.charCode <= 57) {
        return true;
    }
    return false;
}

function setOnliString(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}


function setInputTextToCamelCase() {
    let inputTexts = document.querySelectorAll("input[type=text]");
    let values = [];

    for (let i = 0; i < inputTexts.length; i++) {
        values.push(inputTexts[i].value);
    }

    for (let i = 0; i < values.length; i++) {
        inputTexts[i].value = capitalize(values[i]);

        // console.log(inputTexts[i].value)
    }

}



//FUNCIONES DE LOS COMENTARIOS 

async function getCountObservaciones() {

    let notif = document.querySelector('#observacion');

    let url = `${URL}/api/observ`;
    let response = await fetch(url);
    let countN = await response.json();


    if (countN > 0) {
        notif.style.visibility = 'visible';
        notif.style.opacity = 1;

        notif.innerHTML = `
                    <i class="fa fa-envelope mt-4" title="Mensajes"></i>
                    <span class="badge badge-danger alerta" style="color:#fff;margin-left:-4px;border-radius: 40%;">
                    ${countN}
                    </span>
            `;

    } else {
        notif.style.visibility = 'hidden';
    }
}


async function getObservaciones() {

    let notif = document.querySelector('#observaciones');

    let url = ` ${URL}/api/observaciones`;
    let response = await fetch(url);
    let notificaciones = await response.json();

    if (notificaciones.length > 0) {
        notif.style.display = 'block';
        notif.innerHTML = notificaciones.filter(notificacion => notificacion.uid != document.getElementById('user_login_id').value).map(notificacion => {

            return ` 
            <li class="media bg-light p-2">
                <div class="media-body">
                <h6 class="mt-0">
                ${capitalize(notificacion.p_nombre)} ${capitalize(notificacion.p_apellido)}
                ( ${notificacion.categoria} )
                 <a class="btn-sm  pull-right " onClick="updateNotificacion('${notificacion.id}','cerrar');">
                 <i class="fa fa-times-circle-o" title="Cerrar"></i>
                 </a>

                </h6>
                 <p class="m-0">${capitalize(notificacion.observacion)}</p>

                 <p class="text-right"> 
                    <a class="btn-sm mb-2" data-toggle="collapse" href="#collapseExample${notificacion.id}">
                    Responader
                    </a>
                 </p>
                 <div class="collapse " id="collapseExample${notificacion.id}">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm " id="observacion${notificacion.id}">
                        <div class="input-group-append">
                        <button class="btn btn-info  btn-sm p-2 " type="button" 
                        " style="border-radius: 0; margin-left: -2px;"
                        onClick="sendComentario('${notificacion.id}','${notificacion.iid}','${notificacion.id}',${notificacion.uid});">
                        <i class="fa fa-paper-plane "></i>
                        </button>
                        </div>
                    </div>
                  
                 </div>
               
                </div>
            </li> `;

        }).join('');

    } else {
        notif.style.display = 'hidden';
    }

}



async function getCountNotificaciones() {

    let notif = document.querySelector('#notificacion');

    let url = `${URL}/api/noti`;
    let response = await fetch(url);
    let countN = await response.json();


    if (countN > 0) {
        notif.style.display = 'block';
        notif.innerHTML = `
                    <i class="fa fa-bell mt-4" title="Notificaciones"></i>
                    <span class="badge badge-danger alerta" style="color:#fff;margin-left:-5px;border-radius: 40%;">
                    ${countN}
                    </span>
            `;

    } else {
        notif.style.display = 'none';
    }
}


async function getNotificaciones() {

    let notif = document.querySelector('#notificaciones');

    let url = ` ${URL}/api/notificaciones`;
    let response = await fetch(url);
    let notificaciones = await response.json();

    if (notificaciones.length > 0) {
        notif.style.display = 'block';
        notif.innerHTML = notificaciones.filter(notificacion => notificacion.visto === false).
        filter(notificacion => notificacion.user_id == document.getElementById('user_login_id').value)
        .map(notificacion => {

            return ` 
            <li class="media bg-light p-2">
                <div class="media-body">
                <h6 class="mt-0">
                ${moment(notificacion.created_at).fromNow()}
                 <a class="btn-sm  pull-right " onClick="updateNotificacion('${notificacion.id}','cerrar');">
                 <i class="fa fa-times-circle-o" title="Cerrar"></i>
                 </a>

                </h6>
                 <p class="m-0">${capitalize(notificacion.notificacion)}</p>
                </div>
            </li> `;

        }).join('');

    } else {
        notif.style.display = 'hidden';
    }

}

//enviar comentario o repuesta al mensaje
//mejorar
async function sendComentario(comentario, iid, id, uid) {

    let observacion = document.getElementById(`observacion${comentario}`).value;
    let incidencia_id = iid;
    let _id = id;

    //console.log(document.getElementById(`observacion${comentario}`).value, iid)

    let response = await fetch(`${URL}/api/notificacion/${observacion}/${incidencia_id}/${_id}`);


    let res = await response.json();

    if (res) {
        updateNotificacion(_id);
        $('#staticBackdrop').modal('hide');
        getNotificaciones();
    }

}

//la de enviar
async function updateNotificacion(id, st = '') {

    //actulizamos la notificacion
    let url = `${URL}/api/notificacion/update/${id}`;
    let response = await fetch(url);
    let notificacion = await response.json();

    console.log(notificacion)
    if (notificacion) {
        if(st === 'cerrar') {
            $('#staticBackdrop').modal('hide')  
            getCountNotificaciones()
        }
    }
}

//FIN DE LAS FUNCIONES DE LOS COMENTARIOS 



async function getMotivos(categoria_id) {

    let url = 'api/motivos/' + categoria_id.value;
    let response = await fetch(url);
    let motivos = await response.json();
    if (motivos.length > 0) {
        document.querySelector(".select_motivos").innerHTML = motivos.map((motivo) => {
            return `<option value="${motivo.id}">${motivo.nombre}</option>`;
        }).join('');
    }
}


async function getDataTable() {

    let url = 'api/incidentes';
    let response = await fetch(url);
    let data = await response.json();

    // let table_body = document.getElementById('body-table');
    let user_login = document.getElementById('user_login_tipo').value;

    //console.log(data)

    if (user_login == 1) {
        renderAdmin(data, document.getElementById('body-table'));
    }

    //sistema o técnico
    if (user_login == 2) {
        renderSoporteTecnico(data, document.getElementById('body-table_soporte'));
    }
    if (user_login == 4) {
        renderBasico(data, document.getElementById('body-table'));
    }
    if (user_login == 3) {
        renderUsuario(data, document.getElementById('body-table-usuario'));
    }

}




function renderAdmin(incidentes = [], table_body = '') {
    if (!incidentes.length > 0) {
        table_body.innerHTML = ` 
        <tr>
            <td colspan="4">
                <span class="badge badge-warning">No hay incidentes nuevos!..</span>
            </td>
        <tr>`;
    } else {

        table_body.innerHTML = incidentes.map((incidente) => {

            return `
                <tr>
                    
                    <td>
                        <h6>${incidente.categoria}</h6>
                        <small class="text-muted">
                        ${moment(incidente.fecha).fromNow()}</small>
                    </td>
                    <td colspan="2">${incidente.motivo}</td>
                  
                    <td class="text-center">
                    <a style="font-size: 16px; cursor: pointer;" data-toggle="modal" 
                    data-target="#modalAsignarTecnico" class="btn-sm" 
                    title="Asignar Técnico" data-value="${incidente.iid},incidente_" onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-wrench" aria-hidden="true"></span>
                    </a>
                    </td>
                </tr>
          `

        }).join('');


    }


}

function renderBasico(incidentes = [], table_body = '') {
    if (!incidentes.length > 0) {
        table_body.innerHTML = ` 
        <tr>
            <td colspan="4">
                <span class="badge badge-warning">No hay incidentes nuevos!..</span>
            </td>
        <tr>`;
    } else {

        table_body.innerHTML = incidentes.map((incidente) => {

            return `
                <tr>
                    <td style="width:30px;">
                        <span class="round">${incidente.categoria[0]}</span>
                    </td>
                    <td>
                        <h6>${incidente.categoria}</h6>
                        <small class="text-muted">${moment(incidente.hora, "HH:mm:ss").format("hh:mm A")} </small>
                    </td>
                    <td class="text-center">${incidente.codigo}</td>
                    <td>${incidente.motivo}</td>
                    <td>${moment(incidente.fecha).fromNow()}</td>
                    <td class="text-center">
                    <a style="font-size: 16px; cursor: pointer;" data-toggle="modal" 
                    data-target="#modalAsignarTecnico" class="btn-sm" 
                    title="Asignar Técnico" data-value="${incidente.iid},incidente_" onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-wrench" aria-hidden="true"></span>
                    </a>
                    </td>
                </tr>
          `

        }).join('');


    }


}


function renderSoporteTecnico(incidentes = [], table_body = '') {

    if (!incidentes.length > 0) {
        table_body.innerHTML = ` 
        <tr>
            <td colspan="4">
            <span class="badge badge-warning">No hay incidentes nuevos!..</span>
            </td>
        <tr>`;

    } else {
        table_body.innerHTML = incidentes.filter(incidente => incidente.verificada == false).map((incidente) => {
            // if (incidente.user_id_asignado == document.getElementById('user_login_id').value) {

            return ` <tr>
                <td style="width:30px;">
                    <span class="round">${incidente.p_nombre[0]}</span>
                </td>
                <td>
                    <h6>${incidente.p_nombre} ${incidente.p_apellido}</h6>
                    <small class="text-muted"> ${incidente.departamento}</small>
                </td>
                <td><span> ${ incidente.motivo}</span > </td>
                <td>${moment(incidente.fecha).fromNow()}</td>
                <td class="text-center">${(!incidente.verificada) ? '<i class="fa fa-circle" style="color: #55ce63;cursor:pointer;text-align:center;"title="Incidente abierto"></i>' : 'close'}</td>
                
                <td class="text-center">
                    <a class="btn  btn-sm" href="incidencia/show/${incidente.iid}"
                            title="Ver detalles" style="color:black; font-size:14px; cursor:pointer;">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                    
                    <a style="color:black; font-size:14px; cursor:pointer;" class="btn btn-sm"
                        title="Agregar una Observación" data-toggle="modal" data-target="#modalCreateObservacion"
                        data-value="${incidente.iid},observacion_" onclick="getInputValueModalIncidente(this)">
                        <span class="fa fa-commenting-o" aria-hidden="true"></span>
                
                    </a>
                    
                </td>
            </tr > `
            // }
        }).join('');
    }

    //${moment(incidente.hora, "HH:mm:ss").format("hh:mm A")}
}


function renderUsuario(incidentes = [], table_body = '', user_login) {

    if (!incidentes.length > 0) {
        table_body.innerHTML = ` 
        <tr>
            <td colspan="4">
                <span class="badge badge-warning">No hay incidentes nuevos!..</span>
            </td>
        <tr>`;
    } else {

        table_body.innerHTML = incidentes.filter(incidente => incidente.verificada == false).map((incidente) => {
            //if (!incidente.asignada) {
            return `
                <tr>
                    <td style="width:30px;">
                        <span class="round">${incidente.categoria[0]}</span>
                    </td>
                    <td>
                        <h6>${incidente.categoria}</h6>
                        <small class="text-muted">${moment(incidente.hora, "HH:mm:ss").format("hh:mm A")} </small>
                    </td>
                    <td>${incidente.motivo}</td>
                    <td class="text-center">${(!incidente.verificada) ? '<i class="fa fa-circle" style="color: #55ce63;cursor:pointer;text-align:center;"title="Incidente abierto"></i>' : 'close'}</td>
                    
                    <td class="text-center">
                    ${(incidente.estado_id == 3) ? '<i class="fa fa-clock-o" style="color: #ffbc34; cursor:pointer; text-align: center;" title="En espera..."></i>' : ''}
                    ${(incidente.estado_id == 2) ? '<i class="fa fa-check-circle" style="color: #55ce63; cursor:pointer; text-align: center;" title="Solucionado"></i>' : ''}
                    ${(incidente.estado_id == 1) ? '<i class="fa fa-check-circle" style="color:  red; cursor:pointer; text-align: center;"title="Atendida (sin solución)"></i>' : ''}
                    </td>
                    <td class="text-center">
                        <a class="btn  btn-sm" href="incidencia/show/${incidente.iid}"
                                title="Ver detalles" style="color:black; font-size:14px; cursor:pointer;">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                       
                    </td>
                </tr>
          `
            // }
        }).join('');


    }


}




async function getPersona(ci) {

    let url = 'api/persona/' + ci.value;
    let response = await fetch(url);
    let data = await response.json();
    if (!data.length > 0) {
        document.getElementById("btn_").disabled = true;
        document.getElementById('sp_msj').innerHTML = "Usuario no registrado";
    } else {
        document.getElementById("btn_").disabled = false;
        document.getElementById('sp_msj').innerHTML = "";
    }
}

function setUsuarioPassword(c) {
    let ci = document.getElementById(c).value;
    let u = document.getElementById('usuario');
    let p = document.getElementById('password');
    u.value = ci;
    u.readOnly = true;
    p.value = ci;
    p.readOnly = true;

}


//filter de pdf

async function getInformeTecnicoDay() {

    let url = `api/incidentes/filter/hoy`;
    let response = await fetch(url);
    let data = await response.json();

    if (data.length > 0) {
        renderTableFilterPdfList(data);
    } else {
        document.getElementById('mjs_filter_pdf').innerHTML = `
           <tr> <td><span class="badge badge-warning">No hay resultados!..</span></td></tr>
          `;
    }
}

function renderTableFilterPdfList(data) {

    let div_table = document.getElementById('filter_table_header_pdf');
    let filter_pdf = document.getElementById('filter_pdf');

    div_table.style.display = 'block';

    filter_pdf.innerHTML = data.map(item => {
        return ` 
            <tr> 
            <td>${item.codigo}</td>
            <td>${item.departamento}</td>
            <td>${item.motivo}</td>
            <td>${moment(item.fecha).format('l')}</td>
            <td style="text-align:center; padding-left: 0px;">
                <a class="btn-sm " href="/pdf/informetecnico/${item.iid}"
                        title="Imprimir Incidente" style="color:black;">
                        <span class="fa fa-print" aria-hidden="true"></span>
                </a>
            </td>
            </tr>
        `;
    }).join('');

}








function getModalNotificaciones() {
    $('#staticBackdrop').modal(getNotificaciones());
}


function getModalObservaciones() {
    $('#staticBackdrop2').modal(getObservaciones());
}


window.addEventListener('DOMContentLoaded', () => {

    if (window.location.pathname === '/home') {
        getDataTable();
    }

    getCountNotificaciones();
    getCountObservaciones();
    setInputTextToCamelCase();
});


$('#modalCreateIncidente').on('show.bs.modal', function (e) {
    console.log('modal');
});


$(".modal-close").on("hidden.bs.modal", function () {
    if (window.location.pathname === '/home') {
        getDataTable();
    }
    getCountNotificaciones();
    //$('.bootstrap-data-table').DataTable().fnReloadAjax();
    //$("#boo").load("#boo");
});

function alerta() {
    var elem = document.querySelector('.alerta');
    if (elem != null) {
        elem.style.visibility = (elem.style.visibility == "visible") ? "hidden" : "visible";
    }
}

//setInterval("alerta()", 900);


setInterval(function () {

    if (window.location.pathname === '/home') {
        getDataTable();
    }
    // getDataTable();
    getCountNotificaciones();
    getCountObservaciones();
}, 10000);


