<?php

namespace App\Http\Controllers;

use App\Models\resumenes;
use Illuminate\Http\Request;
use DB;
class ResumenesController extends Controller
{

    public function CuadroEtapaVidaFF(Request $request)
    {
        $localidades=$request->input('Localidades');
        $num=0;
        $Loca1='';
        $Loca2='';
        $Loca3='';
        $Loca4='';
        $Loca5='';
        $Loca6='';
        $Loca7='';
        $Loca8='';
        $Loca9='';
        $Loca10='';
        foreach ($localidades as $key => $value) {
            $num=$num+1;
            switch ($num) {
                case '1':
                    $Loca1=$value;
                    break;
                case '2':
                    $Loca2=$value;
                    break;
                case '3':
                    $Loca3=$value;
                    break;
                case'4':
                    $Loca4=$value;
                    break;
                case'5':
                    $Loca5=$value;
                    break;
                case'6':
                    $Loca6=$value;
                    break;
                case'7':
                    $Loca7=$value;
                    break;
                case'8':
                    $Loca8=$value;
                    break;
                case'9':
                    $Loca9=$value;
                    break;
                case '10':
                    $Loca10=$value;
                    break;
            }
        }
        $ETAPA = DB::select("call ETAPA_VIDA('$Loca1','$Loca2','$Loca3','$Loca4','$Loca5','$Loca6','$Loca7','$Loca8','$Loca9','$Loca10')");
        $FF_TIEMPO_RES = DB::select("call FF_MULTIFAM_TIEMP_RESIDENCIA('$Loca1','$Loca2','$Loca3','$Loca4','$Loca5','$Loca6','$Loca7','$Loca8','$Loca9','$Loca10')");
        return response()->json([
            'ETAPA'=>$ETAPA,
            'FF_TIEMPO_RES'=>$FF_TIEMPO_RES
        ]);
    }

    public function CuadroResumenFF(Request $request)
    {
        $localidades=DB::table('ficha_familiars')
        ->select('Localidad')
        ->distinct()
        ->get();
        return view('CuadrosResumen',compact('localidades'));
    }
}
