<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestadoMosqs extends Model
{
    protected $fillable=[
        "idMonitoreo",
        "Nombre",
        "Apellido",
        "Edad",
        "DNI",
        "NPersonasFemenino",
        "NPersonasMasculino",
        "NEmbarazadas",
        "NNinosMenor5",
        "NCamasDormir",
        "NMosqTela",
        "NMosqMTILDAntiguo",
        "NMTILDEntregados",
        "NMTILDUso",
        "NPersonasUsanMosqFemenino",
        "NPersonasUsanMosqMasculino",
        "NEmbarazadasUsanMosq",
        "NNinosMenor5UsanMosq",
        "NMTILDSinUso",
        "RazonNoUso",
        "NLimpios",
        "NSucios",
        "NRotos",
        "N6_7Noches",
        "N1_5Noches",
        "N0Noches",
        "NMTILDLavados",
        "NLavadoCorrecto",
        "NLavadoIncorrecto",
        "RioLago",
        "BandejaOtro",
        "Sol",
        "Sombra",
        "Colgado",
        "RecogidoDia",
        "GuardadoDia",
        "Embarazadas",
        "NinosMenor5",
        "OtrasPersonas",
        "TipoReaccion1",
        "TipoReaccion2",
        "TipoReaccion3",
        "TipoReaccion4",
        "TipoReaccion5",
        "TipoReaccion6",
        "Informante",
        "Observaciones",
    ];
    
    use HasFactory;
}
