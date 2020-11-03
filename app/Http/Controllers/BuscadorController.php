<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Incidencia;
use App\Observacion;
use Carbon\Carbon;
use App\Sistema;


class BuscadorController extends Controller
{
    public function buscadorInformeTecnico(Request $request)
    {
   
        
        $desde = $request->get('desde');
        $hasta = $request->get('hasta');
        $estado = $request->get('estado');
        
        
        if(!empty($desde) && !empty($hasta) && !empty($estado)){

            $incidencias = Incidencia::orderBy('id', 'DESC')
            ->whereBetween('fecha',[$request->get('desde'),$request->get('hasta')])
            ->where('verificada', '=' , $estado)
            ->paginate(5);
            
        }elseif(!empty($request->get('desde')) && !empty($request->get('hasta')) ){
            $incidencias = Incidencia::orderBy('id', 'DESC')
            ->whereBetween('fecha',[$request->get('desde'),$request->get('hasta')])
            ->paginate(5);
        }else{
            $incidencias = Incidencia::orderBy('id', 'DESC')->paginate(5);
        }
    
    

        return view('reportes.soporteTecnicoPdf', compact('incidencias','desde','hasta','estado') );
    }
}
