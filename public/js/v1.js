
//FORMULARIO DE INICIO DE SESION USUARIO
$(document).ready(function () {
    $("#formlogin").validate({
        rules: {
            password: {
                required: true,
            },

            usuario: {
                required: true
            }

        },
        messages: {
            password: {
                required: "El password es requerido!",
            },
            usuario: {
                required: "El usuario es requerido!"
            }
        }

    });
});


//FORMULARIO PARA REPORTAR UN INCIDENTE
$(document).ready(function () {
    $("#test").validate({
        rules: {
            dirigido: {
                required: true,
            },

            motivo_id: {
                required: true
            }

        },
        messages: {
            dirigido: {
                required: "El password es requerido!",
            },
            motivo_id: {
                required: "El usuario es requerido!"
            }
        }

    });
});

//FORMULARIO DE REGISTRO EN EL SISTEMA
//PARA EL PASSWORD SEGURO

$.validator.addMethod('passwordSeguro', function (value, element) {
    return this.optional(element) || /(?=^.{6,}$)((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.*/.test(value);
});

$.validator.addMethod("soloLetras", function (value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Este campos acepta solo letras sin espacios en blanco!");

$(document).ready(function () {


    $("#passwordAdmin").validate({
        rules: {
            passwordAdmin: {
                required: true,
                passwordSeguro: true
            },
            messages: {
                passwordAdmin: {
                    required: "El campo password es requerido!",
                    passwordSeguro: "Debe tener minimo 6 caracteres entre mayúscula minúscula y números!"
                }
            }
        }
    });




    $("#formRegistro").validate({
        rules: {
            cedula: {
                required: true,
                minlength: 6,

            },
            p_nombre: {
                required: true,
                soloLetras: true
            },
            s_nombre: {
                required: true,
                soloLetras: true

            },
            p_apellido: {
                required: true,
                soloLetras: true

            },
            s_apellido: {
                required: true,
                soloLetras: true

            },
            dia: {
                required: true
            },
            mes: {
                required: true
            },
            anio: {
                required: true
            },
            direccion: {
                required: true,

            },
            telf_habitacion: {
                required: true,
                digits: true,
                minlength: 11,
                maxlength: 11
            },
            telf_movil: {
                required: true,
                digits: true,
                minlength: 11,
                maxlength: 11

            },
            grado_instrucion: {
                required: true,
                soloLetras: true

            },
            ocupacion: {
                soloLetras: true
            },
            nacionalidad: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                passwordSeguro: true
            },
            confir_password: {
                required: true,
                equalTo: "#password"
            },
            tipo: {
                required: true
            }

        },
        messages: {

            cedula: {
                required: "Este campo es requerido!",
                minlength: "Debe tener minimo 6 caracteres!"
            },
            p_nombre: {
                required: "Este campo es requerido!",
            },
            s_nombre: {
                required: "Este campo es requerido!",

            },
            p_apellido: {
                required: "Este campo es requerido",

            },
            s_apellido: {
                required: "Este campo es requerido",

            },
            dia: {
                required: "Fecha N requerido!"
            },
            mes: {
                required: "Fecha N requerido!"
            },
            anio: {
                required: "Fecha N requerido!"
            },
            nacionalidad: {
                required: "Este campo es requerido!"
            },

            direccion: {
                required: "Este campo es requerido!",

            },
            telf_habitacion: {
                required: "Este campo es requerido!",
                digits: "Este campo permite solo números!",
                minlength: "Este campo permite  minimo 11 números!!",
                maxlength: "Este campo permite maximo 11 números!"
            },
            telf_movil: {
                required: "Este campo es requerido!",
                digits: "Este campo permite solo números!",
                minlength: "Este campo permite  minimo 11 números!!",
                maxlength: "Este campo permite maximo 11 números!"
            },
            grado_instrucion: {
                required: "Este campo es requerido!",
            },

            email: {
                email: "Ingrese un Email valido!",
                required: "El campo Email es requerido!"
            },
            password: {
                required: "Este campos es requerido!",
                passwordSeguro: "Debe tener minimo 6 caracteres entre mayúscula minúscula y números!"
            },
            confir_password: {
                required: "Este campos es requerido!",
                equalTo: "Los password no son iguales!",
            }
        }

    });

});
