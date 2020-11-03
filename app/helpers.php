<?php


use Carbon\Carbon;

use App\Persona;

function getOS() {

    if ( isset( $_SERVER ) ) {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

    } else {
        global $HTTP_SERVER_VARS;
        if ( isset( $HTTP_SERVER_VARS ) ) {
            $user_agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
        } else {
            global $HTTP_USER_AGENT;
            $user_agent = $HTTP_USER_AGENT;
        }
    } 
    
    $os_array =  array(
                    '/windows nt 10/i'      =>  'Windows 10',
                    '/windows nt 6.3/i'     =>  'Windows 8.1',
                    '/windows nt 6.2/i'     =>  'Windows 8',
                    '/windows nt 6.1/i'     =>  'Windows 7',
                    '/windows nt 6.0/i'     =>  'Windows Vista',
                    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                    '/windows nt 5.1/i'     =>  'Windows XP',
                    '/windows xp/i'         =>  'Windows XP',
                    '/windows nt 5.0/i'     =>  'Windows 2000',
                    '/windows me/i'         =>  'Windows ME',
                    '/win98/i'              =>  'Windows 98',
                    '/win95/i'              =>  'Windows 95',
                    '/win16/i'              =>  'Windows 3.11',
                    '/macintosh|mac os x/i' =>  'Mac OS X',
                    '/mac_powerpc/i'        =>  'Mac OS 9',
                    '/linux/i'              =>  'Linux',
                    '/ubuntu/i'             =>  'Ubuntu',
                    '/iphone/i'             =>  'iPhone',
                    '/ipod/i'               =>  'iPod',
                    '/ipad/i'               =>  'iPad',
                    '/android/i'            =>  'Android',
                    '/blackberry/i'         =>  'BlackBerry',
                    '/webos/i'              =>  'Mobile'
                  );
    //
    $os_platform = "Unknown OS Platform";
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    return $os_platform;
}


//historial de usuario cargar data

function push_historial($usuario, $operacion){

    $fecha = Carbon::now();

    $so = getOS();

    $host = gethostname();

    $ip  = \Request::ip();

    \DB::table('historials')
    ->insert(
        array(
            
            'ip'    => $ip,
            'so'  => $host,
            'operacion' => $operacion,
            'fecha' => $fecha,
            'user_id' => $usuario,
            )
    );
}




function personaNombres($pn){

    $nombres = explode(" ", $pn);

    return $nombres;
    
}

function personaApellido($sn){

    $apellidos = explode(" ", $sn);
    
    return $apellidos;
}

function personaCreate($request){

    $error = false;

    $nombres = explode(" ", $request->input('p_nombre'));

    $apellidos = explode(" ", $request->input('p_apellido'));
    
    $personaValid = Persona::where('ci' , $request->input('ci'))->get();

    if(is_iterable($personaValid) == 0){
        $persona = Persona::create([
            'ci' => $request->input('ci'),
            'p_nombre' => $nombres[0],
            's_nombre' => $nombres[1],
            'p_apellido' => $apellidos[0],
            's_apellido' => $apellidos[1],
            'fecha_n' => $request->input('fecha_n'),
            'sexo' => $request->input('sexo'),
            'correo' => $request->input('correo')
        ]);
    } else {

        $error = true;

        $persona = false;
    }   
   

    return array($error , $persona);
}



function _generarCodigo($longitud) {
    $key = '';
    //$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $pattern = '1234567890';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}   











