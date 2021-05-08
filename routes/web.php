<?php

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index');

    //persona
    Route::resource('/persona', 'PersonaController');

    //usuario
    Route::resource('/usuarios', 'UsuarioController', ['except' => ['destroy']]);
    Route::get('/password_update/{id}', 'UsuarioPasswordUpdate@show');
    Route::put('/password_update/{id}', 'UsuarioPasswordUpdate@update');
    Route::get('/activar/{id}', 'UsuarioController@postAcivarUsuario');
    Route::get('/cuenta', 'UsuarioController@getCuentaUserLogin');
    Route::get('/password/reset/{id}', 'UsuarioController@getResetPasswordToCiUser');

    //incidencias
    Route::get('/incidencias', 'IncidenciaController@index');
    Route::get('/incidencia/show/{id}', 'IncidenciaController@show');
    Route::post('/incidencia', 'IncidenciaController@store');
    Route::post('/incidencia/asignar', 'IncidenciaController@postAsignar');
    Route::post('/incidencia/observacion', 'IncidenciaController@postObservacion');
    Route::post('/incidencia/update/estado/', 'IncidenciaController@postIncidenciaEstadoUpdate');

    //configuracion generales

    Route::group(['prefix' => 'configuracion'], function() {

        Route::get('generales', 'ConfigGeneralController@index');

        //store y update del logo y nombre mas detalle del sistema
        Route::post('sistema', 'ConfigGeneralController@store_update_sistema')->name('sistema');

        //DEPARTAMENTO => unidades administrativas
        Route::resource('departamento', 'DepartamentoController',  ['except' =>['index', 'show', 'edit', 'destroy']]);
        
        //Divisiones => departamentos OTIC
        Route::resource('division', 'DivisionController',  ['except' =>['index', 'show', 'edit', 'destroy']]); 
      
        //Estados => estados que tendra las incidencia en su ciclo de vida...
        Route::resource('estado', 'EstadoController',  ['except' =>['index', 'show', 'edit', 'destroy']]);
        
        //Motivos => el motivo por el cual se reporta una incidencia....
        Route::resource('motivo', 'MotivoController',  ['except' =>['index', 'show', 'edit', 'destroy']]);

        //DIRECTIVO DEL DEPARTAMENTO OTIC
       // Route::resource('directivo', 'DirectivoController',  ['except' =>['index', 'show', 'edit', 'destroy']]);

        Route::post('generales/directivo', 'ConfigGeneralController@directiva');
    
    });


    //historial de usuario>
    Route::get('historial', 'HistorialUsuarioController@gethistorial')->name('historials');
    Route::post('historial', 'HistorialUsuarioController@postHistorialAjax')->name('get_historial');
    Route::post('historial/filter', 'HistorialUsuarioController@postHistorialFilterForDate')->name('historial_filter');

    
    //RUTAS BASICA DE AYUDA
    Route::get('/ayuda', 'ConfigGeneralController@ayuda');
    Route::get('/desarrolladores', 'ConfigGeneralController@desarrolladores');
   

    //API rutas para controlar peticiones ajax cotra el servidor
    Route::group(['prefix' => 'api'], function() {
        Route::get('verificar_incidente/{id}', 'AjaxController@verificarIncidente');
        Route::get('incidentes', 'AjaxController@getIncidentes');
        Route::get('motivos/{id}', 'AjaxController@getMotivos');
        Route::get('persona/{ci}', 'AjaxController@getPersonaAjax');


        //notificacion del sistema
        Route::get('noti', 'AjaxController@getCountNotificacion');
        Route::get('notificaciones', 'AjaxController@getNotificaciones');
        Route::get('notificacion/update/{notificacion_id}', 'AjaxController@updateNotificacion');
        
        //observacion o comentarios del sistema
        Route::get('observ', 'AjaxController@getCountObservacion');
        Route::get('observaciones', 'AjaxController@getObservaciones');
        Route::get('observacion/{observacion}/{incidencia_id}/{observacion_id}', 'AjaxController@setObservacion');
        Route::get('observacion/update/{observacion_id}', 'AjaxController@updateObservacion');

        //filtrar pdf
        Route::get('incidentes/filter/', 'AjaxController@getInformeTecnico');
        //Route::get('incidentes/filter/mes', 'Pdf\PdfIncidenteController@postInformeTecnico');
       // Route::get('incidentes/filter/{desde}/{hasta}', 'Pdf\PdfIncidenteController@postInformeTecnico');

       Route::get('incidentes_table', 'AjaxController@getIncidenciaTable');
        

    });


    Route::group(['prefix' => 'pdf'], function() {
        //INCIDENTES PDF
        Route::get('incidente/{id}', 'Pdf\PdfIncidenteController@getIncidente');
        Route::get('informetecnico/{id}', 'Pdf\PdfIncidenteController@getInformeTecnico');
        Route::post('info_tec_list', 'Pdf\PdfIncidenteController@getInformeTecnicoListado');
        Route::get('incidente/por/departamento', 'Pdf\PdfIncidenteController@getIncidenteDepartamento');
        Route::get('incidente/por/{falla_id}', 'Pdf\PdfIncidenteController@getIncidentePorFalla');
        Route::get('incidentes/{condicion_id}/{estado_id}', 'Pdf\PdfIncidenteController@getIncidentesPorCondicionEstado');
        Route::get('historial/{desde?}/{hasta?}/{user?}', 'Pdf\PdfIncidenteController@getHistorial');

        //DEPARTAMENTOS PDF
       // Route::get('departamentos', 'Pdf\PdfDepartamentoController@getDepartamentoTotalUsuario');

        //USUARIOS PDF

        //Route::get('usuarios', 'Pdf\PdfUsuarioController@getUsuarios');
        //Route::get('usuario/{id}', 'Pdf\PdfUsuarioController@getUsuario');

        //HISTORIAL PDF
    });
    

    //CARGA LAS VISTAS SEGUN EL TIPO DE USUARIO PARA LOS REPORTES
    Route::get('/reportes', 'ConfigGeneralController@reportes');
    //BUSCADOR DE VARIABLES PARA EL REPORTE
    Route::post('reportes', 'BuscadorController@buscadorInformeTecnico');  
    //FILTRO DE INFORME TECNICO
    Route::post('incidentes/filter/', 'ConfigGeneralController@getInformeTecnico');
  
});




//RUTAS PUBLICAS DE LOGIN GENENERAL
Route::get('/', 'LoginController@index');

Route::post('/login', 'LoginController@store');

Route::get('/salir', 'LoginController@salir');

