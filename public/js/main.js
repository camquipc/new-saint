moment.locale('es');
// en
//moment('2018-08-11').isBetween('2018-08-01', '2018-08-30'); 
const URL = 'http://' + document.getElementById('hostname').value;
const user_id = document.getElementById('user_login_id').value;

//conection websockets
const socket = io.connect('http://localhost:3000');

//listado de incidentes en el table
socket.on("incidencias", (data) =>{
    console.log(data)
    if (window.location.pathname === '/home') {
     getDataTable(data);
    }
})

//notificaciones por las incidencias
socket.on("countNotificacion", async (data) => {
   // console.log(data[0].count);
    const countNotificacion = data[0].count;
   
    if(countNotificacion > 0){

        let url = ` ${URL}/api/notificaciones`;
        let response = await fetch(url);
        let notificaciones = await response.json();
        ///console.log(notificaciones.length)
        if (notificaciones.length > 0) {
            getCountNotificaciones(notificaciones.length);
        }
    }
});

//mensajes por las incidencias
socket.on("countObservacion", async (data) => {
    console.log(data[0].count);
    const countObservacion = data[0].count;
   
    if(countObservacion > 0){

        let url = ` ${URL}/api/observaciones`;
        let response = await fetch(url);
        let observaciones = await response.json();
        console.log(observaciones);
        if (observaciones.length > 0) {
            getCountObservaciones(observaciones.length);
        }
    }

});

//**** websockets ****


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
        
        console.log(res)

        if (res) {
            $('.modal-close').modal('hide');
            socket.emit('add_action' , 'insert');
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



//FUNCIONES DE LOS COMENTARIOS Y NOTIFICACIONES
//OBSERCIONES = A COMENTARIOS
//NOTIFICACIONES = ALERTAS

//enviar comentario o repuesta al mensaje
async function sendComentario(comentario, iid, id, uid) {

    let observacion = document.getElementById(`observacion${comentario}`).value;
    let incidencia_id = iid;
    let _id = id;

    let response = await fetch(`${URL}/api/observacion/${observacion}/${incidencia_id}/${_id}`);

    let res = await response.json();

    if (res) {
        $('#staticBackdrop').modal('hide');
        updateObservacion(_id,'cerrar');
        getObservaciones();
    }

}

function getCountObservaciones(countObser) {

    let observ = document.querySelector('#observacion');
  /*
    let url = `${URL}/api/observ`;
    let response = await fetch(url);
    let countObser = await response.json();
     */

    if (countObser > 0) {
        observ.style.visibility = 'visible';
        observ.style.opacity = 1;

        observ.innerHTML = `
                    <i class="fa fa-envelope mt-4" title="Mensajes"></i>
                    <span class="badge badge-danger alerta" style="color:#fff;margin-left:-4px;border-radius: 40%;">
                    ${countObser}
                    </span>
            `;

    } else {
        observ.style.visibility = 'hidden';
    }
}

async function getObservaciones() {

    let observ = document.querySelector('#observaciones');

    let url = ` ${URL}/api/observaciones`;
    let response = await fetch(url);
    let observaciones = await response.json();

    if (observaciones.length > 0) {
        observ.style.display = 'block';
        observ.innerHTML = observaciones.filter(observacion => observacion.uid != document.getElementById('user_login_id').value).map(observacion => {

            return ` 
            <li class="media bg-light p-2">
                <div class="media-body">
                <h6 class="mt-0">
                ${capitalize(observacion.p_nombre)} ${capitalize(observacion.p_apellido)}
                ( ${observacion.categoria} )
                 <a class="btn-sm  pull-right " onClick="updateObservacion('${observacion.id}','cerrar');">
                 <i class="fa fa-times-circle-o" title="Cerrar"></i>
                 </a>

                </h6>
                 <p class="m-0">${capitalize(observacion.observacion)}</p>

                 <p class="text-right"> 
                    <a class="btn-sm mb-2" data-toggle="collapse" href="#collapseExample${observacion.id}">
                    Responader
                    </a>
                 </p>
                 <div class="collapse " id="collapseExample${observacion.id}">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm " id="observacion${observacion.id}">
                        <div class="input-group-append">
                        <button class="btn btn-info  btn-sm p-2 " type="button" 
                        " style="border-radius: 0; margin-left: -2px;"
                        onClick="sendComentario('${observacion.id}','${observacion.iid}','${observacion.id}',${observacion.uid});">
                        <i class="fa fa-paper-plane "></i>
                        </button>
                        </div>
                    </div>
                  
                 </div>
               
                </div>
            </li> `;

        }).join('');

    } else {
        observ.style.display = 'hidden';
    }

}

async function updateObservacion(id, st = '') {

    //actulizamos la observacion
    let url = `${URL}/api/observacion/update/${id}`;
    let response = await fetch(url);
    let observacion = await response.json();

    console.log(observacion)
    if (observacion) {

        socket.emit('add_action' , 'update');

        if(st === 'cerrar') {
            $('#staticBackdrop').modal('hide'); 
           // getCountObservaciones()
        }
    }
}


//notificaciones del sistema
async function getCountNotificaciones(countN) {

    let notif = document.querySelector('#notificacion');
    /*
    let url = `${URL}/api/noti`;
    let response = await fetch(url);
    let countN = await response.json();
    */

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

async function updateNotificacion(id, st = '') {

    //actulizamos la observacion
    let url = `${URL}/api/notificacion/update/${id}`;
    let response = await fetch(url);
    let notificacion = await response.json();

    
    if (notificacion) {
        if(st === 'cerrar') {
            $('#staticBackdrop').modal('hide')  
            //getCountNotificaciones()
        }
    }
}

//**** */



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

function getDataTable(incidentes) {
    /*
    let url = 'api/incidentes';
    let response = await fetch(url);
    let data = await response.json();
    */
    // let table_body = document.getElementById('body-table');
    let user_login = document.getElementById('user_login_tipo').value;

    //console.log(data)

    if (user_login == 1) {
        renderAdmin(incidentes, document.getElementById('body-table'));
    }

    //sistema o técnico
    if (user_login == 2) {
        renderSoporteTecnico(incidentes, document.getElementById('body-table_soporte'));
    }
    if (user_login == 4) {
        renderBasico(incidentes, document.getElementById('body-table'));
    }
    if (user_login == 3) {
        renderUsuario(incidentes, document.getElementById('body-table-usuario'));
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
    //getCountNotificaciones();
    //getCountObservaciones();
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

/*
setInterval(function () {

    if (window.location.pathname === '/home') {
        getDataTable();
    }
    // getDataTable();
    //getCountNotificaciones();
    //getCountObservaciones();
}, 10000);

*/
